<?php

/**
 * Class Article -> Artikelverwaltung
 * 
 * @author C. Broeckmann
 * @version 1.0
 *
 * @Entity
 * @Table(name="article")
 */
class Article
{
	/** @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false) */
	private $id;
	/** @Column(type="boolean") */
	private $active;
	/** @Column(type="string", length=10, unique=true, nullable=true) */
	private $articlenumber;
	/** @Column(type="string", length=100, nullable=false) */
	private $name;
	/** @Column(type="string", length=100, nullable=false) */
	private $image;
	/** @Column(type="string", length=10) */
	private $gender;
	/** @Column(type="integer") */
	private $size;
	/** @Column(type="string", length=20) */
	private $color;
	/** @Column(type="string", length=100) */
	private $material;
	/** @Column(type="string", length=500, nullable=false) */
	private $description;
	/** @Column(type="decimal", precision=10, scale=2, nullable=false) */
	private $price;
	/** @Column(type="decimal", precision=10, scale=2, nullable=false) */
	private $vat;
	/** @Column(type="integer", nullable=false) */
	private $inventory;
	/** @Column(type="string", length=12, nullable=false) */
	private $category;

	public function __construct() {
	}

	/**
 	* Get all Articles.
 	* 
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
 	* @return array all articles if user is admin, only active articles otherwise
 	*/
	public static function getAll($em) {
		if($_SESSION['user']->checkAdmin()) {
			$articles = $em->getRepository('Article')->findAll();
		}
		else {
			$articles = $em->getRepository('Article')->findBy(['active' => true]);
		}
		return ['articles' => $articles, 'success' => $articles ? true : false];
	}

	/**
 	* Get Article by id.
 	* 
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
  * @param $id id of Article
 	* @return Article
 	*/
	public static function getById($em, $id) {
		return $em->getRepository('Article')->findOneById($id);
	}

	/**
 	* Create new or edit existing Article.
 	* 
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
  * @param $id id of Article
 	* @return array element 'article' will contain Article data
 	*/
	
	public static function editCreate($em, $id) {
		$data = array();
		$article = null;
		if($id) {
			$article = Article::getById($em, $id);
			if(!$article) {
				$data['error'] = 'Artikel nicht gefunden!';
			}
		}
		if(!$article) {
			$article = new Article();
		}
		if(!empty($_POST['editsubmit'])) {
			$articleWithArticlenumber = $em->getRepository('Article')->findOneByArticlenumber(getPostParam('articlenumber'));
			if($articleWithArticlenumber && $articleWithArticlenumber->getId() != $article->getId()) {
				$data['error'][] = 'Artikel mit der Artikelnummer ' . getPostParam('articlenumber') . ' existiert bereits!';
			}
			$articleWithName = $em->getRepository('Article')->findOneByName(getPostParam('name'));
			if($articleWithName && $articleWithName->getId() != $article->getId()) {
				$data['error'][] = 'Artikel mit Name ' . getPostParam('name') . ' existiert bereits!';
			}
			switch(getPostParam('active','false')) {
 				case 'true':
 					$user->setActive(true);
 					break;
 				case 'false':
 					$user->setActive(false);
 					break;
 				default:
 			}
			$article->setArticlenumber(getPostParam('articlenumber'));
			$article->setName(getPostParam('name'));
			if($_FILES["image"]["tmp_name"] !== ''){
				$article->setImage(Media::uploadPicture($_FILES["image"]["tmp_name"]));
			}
			$article->setGender(getPostParam('gender'));
			$article->setSize(getPostParam('size'));
			$article->setColor(getPostParam('color'));
			$article->setMaterial(getPostParam('material'));
			$article->setDescription(getPostParam('description'));
			$article->setPrice(getPostParam('price'));
			$article->setVat(getPostParam('vat'));
			$article->setInventory(getPostParam('inventory'));
			$article->setCategory(getPostParam('category'));
			if(empty($data['error'])) {
				$em->persist($article);
				$em->flush();
				$data['success'] = true;
			}
		}
		$data['article'] = $article;

		return $data;
	}
	
	public static function createUpdate($entityManager) {
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		if($id) {
			$article = Article::getOneById($id);
			if(!$article) {
				$data['error'][] = 'Article not found!';
			}
		}
		else {
			$article = new Article();
		}
		$params = array('id', 'articlenumber', 'name', 'image', 'gender', 'size', 'color', 'material', 'description', 'price', 'vat', 'inventory', 'category');
		foreach($params as $param) {
			isset($_POST[$postFieldName]) ? $_POST[$postFieldName] : null;				
		}
	}
	
	// getters/setters for private properties
	public function getId() {
		return $this->id;
	}
	
	public function getActive() {
		return $this->active;
	}
	
	public function setActive($active) {
		$this->active = $active;
	}
	
	public function getArticlenumber() {
		return $this->articlenumber;
	}
	public function setArticlenumber($articlenumber) {
		
		$this->articlenumber = $articlenumber;
	}
	
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
	}
	
	public function getGender() {
		return $this->gender;
	}
	public function setGender($gender) {
		$this->gender = $gender;
	}
	
	public function getSize() {
		return $this->size;
	}
	public function setSize($size) {
		$this->size = $size;
	}
	
	public function getColor() {
		return $this->color;
	}
	public function setColor($color) {
		$this->color = $color;
	}
	
	public function getMaterial() {
		return $this->material;
	}
	public function setMaterial($material) {
		$this->material = $material;
	}
	
	public function getdescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
	}
	
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
	}
	
	public function getVat() {
		return $this->vat;
	}
	public function setVat($vat) {
		$this->vat = $vat;
	}
	
	public function getInventory() {
		return $this->inventory;
	}
	public function setInventory($inventory) {
		$this->inventory = $inventory;
	}
	
	public function getCategory() {
		return $this->category;
	}
	public function setCategory($category) {
		$this->category = $category;
	}
	
	public static function getArticleData($article) {
		return array(
			'id' => $article ? $article->getId() : 0,
			'articlenumber' => $article ? $article->getArticlenumber() : '',
			'name' => $article ? $article->getName() : '',
			'image' => $article ? $article->getImage() : '',
			'gender' => $article ? $article->getGender() : '',
			'size' => $article ? $article->getSize() : '',
			'color' => $article ? $article->getColor() : '',
			'material' => $article ? $article->getMaterial() : '',
			'description' => $article ? $article->getDescription() : '',
			'price' => $article ? $article->getPrice() : '',
			'vat' => $article ? $article->getVat() : '',
			'inventory' => $article ? $article->getInventory() : '',
			'category' => $article ? $article->getCategory() : '',
		);
	}
}
