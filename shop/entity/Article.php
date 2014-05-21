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
	/**
  * @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false)
  * @var int id of article object in database
  */
	private $id;
	/**
  * @Column(type="boolean")
  * @var boolean whether or not article is active
  */
	private $active;
	/**
  * @Column(type="string", length=10, unique=true, nullable=true)
  * @var string article number
  */
	private $articlenumber;
	/**
  * @Column(type="string", length=100, nullable=false)
  * @var string name of article
  */
	private $name;
	/**
  * @Column(type="string", length=100, nullable=false)
  * @var string file name of article image
  */
	private $image;
	/**
  * @Column(type="string", length=10)
  * @var string gender
  */
	private $gender;
	/**
  * @Column(type="integer")
  * @var int size
  */
	private $size;
	/**
  * @Column(type="string", length=20)
  * @var string color
  */
	private $color;
	/**
  * @Column(type="string", length=100)
  * @var string material
  */
	private $material;
	/**
  * @Column(type="string", length=500, nullable=false)
  * @var string description of article
  */
	private $description;
	/**
  * @Column(type="decimal", precision=10, scale=2, nullable=false)
  * @var float unit price of article
  */
	private $price;
	/**
  * @Column(type="decimal", precision=10, scale=2, nullable=false)
  * @var float tax rate to apply
  */
	private $vat;
	/**
  * @Column(type="integer", nullable=false)
  * @var int current inventory of article
  */
	private $inventory;
	/**
  * @Column(type="string", length=12, nullable=false)
  * @var string category
  */
	private $category;

	/**
 	* get all articles
 	* 
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
 	* @return array element 'article' containing all articles if user is admin, only active articles otherwise,
  *    element 'success' will contain true or false depending on whether any articles were found.
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
 	* get an article by id
 	* 
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
  * @param int $id id of article
 	* @return Article
 	*/
	public static function getById($em, $id) {
		return $em->getRepository('Article')->findOneById($id);
	}

	/**
 	* Create new or edit existing article.
 	* 
  * Takes data from POST parameters of same name as Article properties:
  * 'active', 'articlenumber', 'gender', 'size', 'color', 'material', 'description', 'price', 'vat', 'inventory', 'category'.
  * 
  * Takes data from $_FILES['image'] array to store uploaded article image if set.
  *
 	* @author C. Broeckmann 2014
 	* @version 1.0
 	* 
 	* @param entityManager $em EntityManager instance
  * @param int $id optional - id of existing article to update
 	* @return array element 'article' will contain article data
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
			$article->setActive(getPostParam('active', 0));
			$article->setArticlenumber(getPostParam('articlenumber'));
			$article->setName(getPostParam('name'));
			if($_FILES['image']['tmp_name'] !== ''){
				$article->setImage(Media::uploadPicture($_FILES['image']['tmp_name']));
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

	// getters/setters for private properties

	/**
 	* get property $id
  *
 	* @return int 
 	*/
	public function getId() {
		return $this->id;
	}
	
	/**
 	* get property $active
  *
 	* @return boolean
 	*/
	public function getActive() {
		return $this->active;
	}
	
	/**
 	* set property $active
  *
  * @param boolean $active
 	* @return void
 	*/
	public function setActive($active) {
		$this->active = $active;
	}
	
	/**
 	* get property $articlenumber
  *
 	* @return string
 	*/
	public function getArticlenumber() {
		return $this->articlenumber;
	}
	/**
 	* set property $articlenumber
  *
  * @param string $articlenumber
 	* @return void
 	*/
	public function setArticlenumber($articlenumber) {
		
		$this->articlenumber = $articlenumber;
	}
	
	/**
 	* get property $name
  *
 	* @return string
 	*/
	public function getName() {
		return $this->name;
	}
	/**
 	* set property $name
  *
  * @param string $name
 	* @return void
 	*/
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
 	* get property $image
  *
 	* @return string filename of article image
 	*/
	public function getImage() {
		return $this->image;
	}
	/**
 	* set property $image
  *
  * @param string $image 
 	* @return void
 	*/
	public function setImage($image) {
		$this->image = $image;
	}
	
	/**
 	* get property $gender
  *
 	* @return string
 	*/
	public function getGender() {
		return $this->gender;
	}
	/**
 	* set property $gender
  *
  * @param string $gender
 	* @return void
 	*/
	public function setGender($gender) {
		$this->gender = $gender;
	}
	
	/**
 	* get property $size
  *
 	* @return int
 	*/
	public function getSize() {
		return $this->size;
	}
	/**
 	* set property $size
  *
  * @param int $size
 	* @return void
 	*/
	public function setSize($size) {
		$this->size = $size;
	}
	
	/**
 	* get property $color
  *
 	* @return string
 	*/
	public function getColor() {
		return $this->color;
	}
	/**
 	* set property $color
  *
  * @param string $color
 	* @return void
 	*/
	public function setColor($color) {
		$this->color = $color;
	}
	
	/**
 	* get property $material
  *
 	* @return string
 	*/
	public function getMaterial() {
		return $this->material;
	}
	/**
 	* set property $material
  *
  * @param string $material
 	* @return void
 	*/
	public function setMaterial($material) {
		$this->material = $material;
	}
	
	/**
 	* get property $description
  *
 	* @return string
 	*/
	public function getdescription() {
		return $this->description;
	}
	/**
 	* set property $description
  *
  * @param string $description
 	* @return void
 	*/
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
 	* get property $price
  *
 	* @return float
 	*/
	public function getPrice() {
		return $this->price;
	}
	/**
 	* set property $price
  *
  * @param float $price
 	* @return void
 	*/
	public function setPrice($price) {
		$this->price = $price;
	}
	
	/**
 	* get property $vat
  *
 	* @return float
 	*/
	public function getVat() {
		return $this->vat;
	}
	/**
 	* set property $vat
  *
  * @param float $vat
 	* @return void
 	*/
	public function setVat($vat) {
		$this->vat = $vat;
	}
	
	/**
 	* get property $inventory
  *
 	* @return int
 	*/
	public function getInventory() {
		return $this->inventory;
	}
	/**
 	* set property $inventory
  *
  * @param int $inventory
 	* @return void
 	*/
	public function setInventory($inventory) {
		$this->inventory = $inventory;
	}
	
	/**
 	* get property $category
  *
 	* @return string
 	*/
	public function getCategory() {
		return $this->category;
	}
	/**
 	* set property $category
  *
  * @param string $category
 	* @return void
 	*/
	public function setCategory($category) {
		$this->category = $category;
	}
	
	/**
 	* get article data for display purposes
  *
  * @param Article $article
 	* @return array
 	*/
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
