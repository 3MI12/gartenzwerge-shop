<?php
//namespace Models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="`order`")
 */
class Order {
	/** @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false) */
	private $id;
	/**
     * @ManyToOne(targetEntity="User", inversedBy="orders")
     **/
	private $user;
	/** @date @Column(type="datetime") */
	private $ordertime;
	/** @Column(type="decimal", precision=10, scale=2, nullable=false) */
	private $price;
	/** @Column(type="boolean") */
	private $canceled;
	/**
     * @ManyToMany(targetEntity="OrderArticle", cascade={"persist"})
     **/
	private $positions;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
    }
	
	public static function getAll($em) {
		return $em->getRepository('Order')->findAll();
	}

	public static function getById($em, $id) {
		return $em->getRepository('Order')->findOneById($id);
	}
	
	public static function getByCustomer($em, $userId) {
		return $em->getRepository('Order')->findByUser($userId);
	}
	
	public function add($em) {
		$data = array('success' => true, 'error' => array());
		$orderQuantity = getPostParam('orderquantity', array());
		foreach($orderQuantity as $articleId => $quantity) {
			$article = Article::getById($em, $articleId);
			$orderArticle = $this->positions->get($articleId);
			if(!$orderArticle) {
				$orderArticle = OrderArticle::createFromArticle($article);
				$this->positions->set($articleId, $orderArticle);
			}
			if($quantity > 0) {
				if($article->getInventory() >= $quantity) {
					$orderArticle->setQuantity($quantity);
				}
				else {
					$orderArticle->setQuantity($article->getInventory());
					$data['success'] = false;
					$data['error'][] = 'Von Artikel ' . $orderArticle->getName() . ' sind nur noch ' . $article->getInventory() . ' Stück auf Lager!';
				}
			}
			else {
				$this->positions->remove($articleId);
			}
		}
		$data['positions'] = $this->positions;
		$data['price'] = $this->calcPrice();
		return $data;
	}
	
	public function calcPrice() {
		$price['articles'] = 0;
		foreach($this->positions as $orderArticle) {
			$price['articles'] += $orderArticle->getPrice() * $orderArticle->getQuantity();
		}
		$price['shipping'] = $price['articles'] < SHIPPING_FREE_FROM ? SHIPPING_FEE : 0;
		$price['total'] = $price['articles'] + $price['shipping'];
		$this->price = $price['total'];
		return $price;
	}
	
	public function getQuantityById($articleId) {
		$orderArticle = $this->positions->get($articleId);
		return $orderArticle ? $orderArticle->getQuantity() : 0;
	}
	
	public function getOrderData() {
		return array(
			'positions' => $this->positions,
			'price' => $this->calcPrice(),
		);
	}
	
	public function finalize($em) {
		$data = array('success' => true, 'error' => array());
		if(!$_SESSION['user']->getId()) {
			$_SESSION['messages'][] = 'Sie müssen sich zunächst anmelden!';
			$data['redirect'] = '/user/login/';
			return $data;
		}
		$this->user = $_SESSION['user']->getId();
		foreach($this->positions as $orderArticle) {
			$article = Article::getById($em, $orderArticle->getArticleId());
			if($orderArticle->getQuantity() > $article->getInventory()) {
				$data['success'] = false;
				$data['error'][] = 'Von Artikel ' . $article->getName() . ' sind nur noch ' . $article->getInventory() . ' Stück auf Lager!';
				$orderArticle->getQuatity($article->getInventory());
			}
		}
		if($data['success']) {
			foreach($this->positions as $orderArticle) {
				$article = Article::getById($em, $orderArticle->getArticleId());
				$article->setInventory($article->getInventory() - $orderArticle->getQuantity());
				$em->persist($article);
			}
		}
		$this->ordertime = new DateTime();
		$em->persist($this);
		$em->flush();
		return $data;
	}
}
