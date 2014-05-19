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
     * @ManyToOne(targetEntity="User", inversedBy="orders", cascade={"all"})
     **/
	private $user;
	/** @date @Column(type="datetime") */
	private $ordertime;
	/** @Column(type="decimal", precision=10, scale=2, nullable=false) */
	private $price;
	/** @Column(type="boolean") */
	private $canceled;
	/**
     * @ManyToMany(targetEntity="OrderArticle", cascade={"all"})
     **/
	private $positions;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
    }
	
	public static function getAll($em) {
		if(!$_SESSION['user']->checkAdmin()) {
			$_SESSION['messages'][] = 'Sie müssen als Administrator angemeldet sein, um alle Bestellungen anzusehen!';
			return;
		}
		$start = time();
		$orders = $em->getRepository('Order')->findAll();
		$data['orders'] = array();
		foreach($orders as $order) {
			$data['orders'][$order->getId()] = $order->getOrderData();
		};
		return $data;
	}

	public static function getAllByUser($em) {
		if(!$_SESSION['user']->getId()) {
			$_SESSION['messages'][] = 'Sie müssen sich zuerst anmelden, um Ihre Bestellungen anzusehen!';
			$data['redirect'] = '/user/login/';
			return $data;
		}
		$orders = $em->getRepository('Order')->findByUser($_SESSION['user']);
		$data['orders'] = array();
		foreach($orders as $order) {
			$data['orders'][$order->getId()] = $order->getOrderData();
		};
		return $data;
	}

	public static function getById($em, $id) {
		$data = array();
		$order = $em->getRepository('Order')->findOneById($id);
		if($order) {
			if($_SESSION['user']->checkAdmin() || $order->user->getId() == $_SESSION['user']->getId()) {
				$data['order'] = $order->getOrderData();
			}
			else {
				$data['error'][] = 'Sie haben keine Berechtigung, diese Bestellung anzuschauen!';
			}
		}
		else {
			$data['error'][] = 'Bestellung existiert nicht!';
		}
		return $data;
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
			'user' => $this->user,
			'ordertime' => $this->ordertime,
		);
	}
	
	public function finalize($em) {
		$data = array('success' => true, 'error' => array());
		if(!$_SESSION['user']->getId()) {
			$_SESSION['messages'][] = 'Sie müssen sich zunächst anmelden!';
			$data['redirect'] = '/user/login/';
			return $data;
		}
		$this->user = User::getUserById($em, $_SESSION['user']->getId());
		foreach($this->positions as $orderArticle) {
			$article = Article::getById($em, $orderArticle->getArticleId());
			if($orderArticle->getQuantity() > $article->getInventory()) {
				$data['success'] = false;
				$data['error'][] = 'Von Artikel ' . $article->getName() . ' sind nur noch ' . $article->getInventory() . ' Stück auf Lager!';
				$orderArticle->setQuantity($article->getInventory());
			}
		}
		if($data['success']) {
			foreach($this->positions as $orderArticle) {
				$article = Article::getById($em, $orderArticle->getArticleId());
				$article->setInventory($article->getInventory() - $orderArticle->getQuantity());
				$em->persist($article, $orderArticle);
			}
		}
		$this->ordertime = new DateTime();
		$this->canceled = false;
		//$this->user->getOrders()->add($this);
		//var_dump($this->user->getOrders());
		$em->persist($this->user);
		$em->persist($this);
		$em->flush();
		return $data;
	}
	
	public function getId() {
		return $this->id;
	}
	public function getUser() {
		return $this->user;
	}
}
