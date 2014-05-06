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
     * @OneToMany(targetEntity="user", mappedBy="order")
     **/
	private $user;
	/**
     * @OneToMany(targetEntity="article", mappedBy="order")
	 * @var Article[]
     **/
	private $articles;

	private $em;
	
    public function __construct($em)
    {
		$this->em = $em;
        $this->articles = new ArrayCollection();
    }
	
	public static function getAll($em) {
		return $em->getRepository('Order')->findAll();
	}

	public static function getById($em, $id) {
		$order = $em->getRepository('Order')->findById($id);
		if($order) {
			return $order[0];
		}
		else {
			return null;
		}
	}
	
	public static function getByCustomer($em, $userId) {
		return $em->getRepository('Order')->findByUser($userId);
	}
	
	public function addArticle($articleId, $quantity) {
		if($quantity > 0) {
			$this->articles[$articleId] = $quantity;
		}
		else {
			unset($this->articles[$articleId]);
		}
	}
	
	public function getArticles() {
		return $this->articles;
	}
}
