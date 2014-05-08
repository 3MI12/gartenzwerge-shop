<?php
//namespace Models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="order")
 */
class Order {
	/** @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false) */
	private $id;
	/**
<<<<<<< HEAD
     * @OneToMany(targetEntity="user", mappedBy="order")
=======
     * @OneToMany(targetEntity="sysuser", mappedBy="order")
>>>>>>> master
     **/
	private $user;
	/**
     * @OneToMany(targetEntity="article", mappedBy="order")
	 * @var positions[]
     **/
	private $positions;

	private $em;
	
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
		var_dump($orderQuantity);
		foreach($orderQuantity as $articleId => $quantity) {
			$article = Article::getById($em, $articleId);
			if($quantity > 0) {
				if($article->getInventory() >= $quantity) {
					$this->positions[$articleId] = $quantity;
				}
				else {
					$this->positions[$articleId] = $article->getInventory();
					$data['success'] = false;
					$data['error'][] = 'Von Artikel ' . $article->getName() . ' sind nur noch ' . $article->getInventory() . ' Stück auf Lager!';
				}
			}
			else {
				unset($this->positions[$articleId]);
			}
		}
		$data['positions'] = $this->getArticles($em)['positions'];		
		return $data;
	}
	
	public function getArticles($em) {
		$data = ['positions' => []];
		$sumPrices = 0;
		foreach($this->positions as $articleId => $quantity) {
			$article = Article::getById($em, $articleId);
			$data['positions'][] = ['article' => $article, 'quantity' => $quantity];
			$sumPrices += $article->getPrice() * $quantity;
		}
		$data['sumPrices'] = $sumPrices;
		return $data;
	}
	
	public function getQuantityById($articleId) {
		return isset($this->positions[$articleId]) ? $this->positions[$articleId] : 0;
	}
	
	public function finalize($em) {
		$data = array('success' => true, 'error' => array());
		foreach($this->positions as $articleId => $quantity) {
			$article = Article::getById($em, $articleId);
			if($quantity > $article->getInventory()) {
				$data['success'] = false;
				$data['error'][] = 'Von Artikel ' . $article->getName() . ' sind nur noch ' . $article->getInventory() . ' Stück auf Lager!';
				$this->positions[$articleId] = $article->getInventory();
			}
		}
		if($data['success']) {
			foreach($this->positions as $articleId => $quantity) {
				$article = Article::getById($articleId);
				$article->setInventory($article->getInventory() - $quantity);
			}
		}
		$em->persist($this);
		$em->flush();
		return $data;
	}
}
