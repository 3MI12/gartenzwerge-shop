<?php

/**
 * @Entity
 * @Table(name="orderarticle")
 */
class OrderArticle extends Article
{
	/** @Column(type="integer", nullable=false) */
	private $articleid;
	
	/** @Column(type="integer", nullable=false) */
	private $quantity;
	// /**
    // * @OneToOne(targetEntity="Order")
    // **/	
	//private $order;
	
	public function getArticleid() {
		return $this->articleid;
	}
	public function setArticleid($id) {
		$this->articleid = $id;
	}

	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

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
