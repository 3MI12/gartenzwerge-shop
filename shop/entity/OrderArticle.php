<?php

/**
 * Class OrderArticle -> Artikelverwaltung
 * 
 * Extends Article for storage of ordered Articles
 *
 * @author C. Broeckmann
 * @version 1.0
 *
 * @Entity
 * @Table(name="orderarticle")
 */
class OrderArticle extends Article
{
	/**
  * @Column(type="integer", nullable=false)
  * @var int database id of corresponding Article object
  */
	private $articleid;
	
	/**
  * @Column(type="integer", nullable=false)
  * @var int quantity in which article is ordered
  */
	private $quantity;
	
	/**
 	* get property $articleid
  *
 	* @return int 
 	*/
	public function getArticleid() {
		return $this->articleid;
	}
	/**
 	* set property $articleid
  *
  * @param int $id
 	* @return void
 	*/
	public function setArticleid($id) {
		$this->articleid = $id;
	}

	/**
 	* get property $quantity
  *
 	* @return int 
 	*/
	public function getQuantity() {
		return $this->quantity;
	}
	/**
 	* set property $quantity
  *
  * @param int $quantity
 	* @return void
 	*/
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	/**
 	* creates OrderArticle as copy of an Article
  *
  * @param Article $article
 	* @return OrderArticle
 	*/
	public static function createFromArticle($article) {
		$orderArticle = new OrderArticle();
		$orderArticle->setArticleid($article->getId());
		$orderArticle->setActive($article->getActive());
		$orderArticle->setArticlenumber(NULL); //$article->getArticlenumber());
		$orderArticle->setName($article->getName());
		$orderArticle->setImage($article->getImage());
		$orderArticle->setGender($article->getGender());
		$orderArticle->setSize($article->getSize());
		$orderArticle->setColor($article->getColor());
		$orderArticle->setMaterial($article->getMaterial());
		$orderArticle->setDescription($article->getDescription());
		$orderArticle->setPrice($article->getPrice());
		$orderArticle->setVat($article->getVat());
		$orderArticle->setInventory($article->getInventory());
		$orderArticle->setCategory($article->getCategory());
		return $orderArticle;
	}
}
