<?php
//namespace Models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Order -> Bestellung
 * 
 * Acts as cart and stores customer orders
 *
 * @author C. Broeckmann
 * @version 1.0
 *
 * @Entity
 * @Table(name="`order`")
 */
class Order {
	/**
  * @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false)
  * @var int id of order object in database
  */
	private $id;
	/**
  * @ManyToOne(targetEntity="User", inversedBy="orders", cascade={"all"})
  * @var User the customer who made the order
  **/
	private $user;
	/**
  * @date @Column(type="datetime")
  * @var DateTime time the order was placed
  */
	private $ordertime;
	/**
  * @Column(type="decimal", precision=10, scale=2, nullable=false)
  * @var float total price of order including shipping
  */
	private $price;
	/**
  * @Column(type="boolean")
  * @var boolean whether or not order was canceled
  */
	private $canceled;
	/**
  * @ManyToMany(targetEntity="OrderArticle", cascade={"all"})
  * @var OrderArticle[] the articles ordered
  **/
	private $positions;

  /**
 	* constructor, initializes $positions as ArrayCollection
  */  
  public function __construct() {
    $this->positions = new ArrayCollection();
  }
	
	/**
 	* get all orders
  *
  * @param entityManager $em EntityManager instance
 	* @return Array element 'orders' containing order data
 	*/
	public static function getAll($em) {
		if(!User::checkAdmin()) {
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

	/**
 	* get all orders for the currently logged in user
  *
  * @param entityManager $em EntityManager instance
 	* @return Array element 'orders' containing order data
 	*/
	public static function getAllByUser($em) {
		if(!$_SESSION['user']->getId()) {
			//$_SESSION['messages'][] = 'Sie müssen sich zuerst anmelden, um Ihre Bestellungen anzusehen!';
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

	/**
 	* get order by id
  *
  * @param entityManager $em EntityManager instance
  * @param int $id order id
 	* @return Array element 'order' containing order data
 	*/
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
	
	/**
 	* get orders by customer
  *
  * @param entityManager $em EntityManager instance
  * @param int $userId user id
 	* @return Array
 	*/
	public static function getByCustomer($em, $userId) {
		return $em->getRepository('Order')->findByUser($userId);
	}
	
	/**
 	* add an article to cart
  *
  * Uses POST param 'orderquantity' - an array with article ids as keys and quantity of article to put in cart as input.
  * 
  * Will create an error message for each ordered article with a quantity that is greater than the available inventory.
  *
  * @param entityManager $em EntityManager instance
 	* @return Array containing 'success', 'error', 'positions' and 'price'
 	*/
	public function add($em) {
		$data = array('success' => true, 'error' => array());
		$orderQuantity = getPostParam('orderquantity', array());
		foreach($orderQuantity as $articleId => $quantity) {
			$quantity = (int)$quantity;
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
	
	/**
 	* calculates price of order
  *
 	* @return Array containing entries 'articles', 'shipping' and 'total'
 	*/
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
	
	/**
 	* get quantity of an article in cart
  *
  * @param int $articleId
 	* @return float
 	*/
	public function getQuantityById($articleId) {
		$orderArticle = $this->positions->get($articleId);
		return $orderArticle ? $orderArticle->getQuantity() : 0;
	}
	
	/**
 	* get order data for display purposes
  *
 	* @return Array contains entries 'id', 'positions', 'price', 'user', 'ordertime' and 'canceled'
 	*/
	public function getOrderData() {
		return array(
			'id' => $this->getId(),
			'positions' => $this->positions,
			'price' => $this->calcPrice(),
			'user' => $this->user,
			'ordertime' => $this->ordertime,
			'canceled' => $this->canceled,
		);
	}
	
	/**
 	* persist shopping cart content to database
  *
  * Checks for each OrderArticle placed in cart whether corresponding Article still is available in ordered quantity.
  * If this succeeds for all ordered articles, will then persist OrderArticles with ordered quantity in database,
  * and will finally persist Order object as well. Clears Order object stored in session afterwards, so that cart will be empty again.
  *
  * Will issue an error for every ordered article that is not available in requested quantity any more otherwise.
  *
 	* @return Array will contain 'success', 'error' and possible 'redirect' instruction
 	*/
	public function finalize($em) {
		$data = array('success' => true, 'error' => array());
		if(!count($this->positions)) {
			$_SESSION['messages'][] = 'Ihr Warenkorb ist noch leer!';
			$data['redirect'] = '/cart/';
			return $data;
		}
		if(!$_SESSION['user']->getId()) {
			$_SESSION['messages'][] = 'Sie müssen sich zunächst anmelden!';
			$data['redirect'] = '/user/login/';
			return $data;
		}
		if(!$_SESSION['user']->ableToOrder()) {
			$_SESSION['messages'][] = 'Um Bestellen zu können, müssen Sie zunächst ihr Profil vervollständigen!';
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
		        $this->ordertime = new DateTime();
		        $this->canceled = false;
		        $em->persist($this->user);
		        $em->persist($this);
		        $em->flush();
		        $_SESSION['messages'][] = 'Bestellung ausgeführt!';
		        $_SESSION['order'] = new Order();
		        sendOrderConfirmMail($this, $this->user);		
		}
		else {
			$errors = $data['error'];
			$success = $data['success'];
			$data = $this->getOrderData();
			$data['error'] = $errors;
			$data['success'] = $success;
		}
		return $data;
	}
	
	/**
 	* cancel an existing order
  *
  * Cancels an existing order. Will add ordered quantity of each OrderArticle back onto corresponding Article's inventory.
  *
  * @param entityManager $em EntityManager instance
 	* @return array will containg 'redirect' to order list
 	*/
	public function cancel($em) {
		if(!$_SESSION['user']->checkAdmin()) {
			$_SESSION['messages'][] = 'Sie müssen als Administrator angemeldet sein, um Bestellungen stornieren zu können!';
			return;
		}
		if(!$this->canceled) {
			foreach($this->positions as $orderArticle) {
				$article = Article::getById($em, $orderArticle->getArticleid());
				$article->setInventory($article->getInventory() + $orderArticle->getQuantity());
				$em->persist($article);
			}
			$this->canceled = true;
			$em->persist($this);
			$em->flush();
			$_SESSION['messages'][] = 'Bestellung storniert!';
		}
		$data['redirect'] = '/order/list/';
		return $data;
	}
	
	/**
 	* get property $id
  *
 	* @return int 
 	*/
	public function getId() {
		return $this->id;
	}
	
	/**
 	* get property $user
  *
 	* @return User 
 	*/
  public function getUser() {
		return $this->user;
	}
	
}
