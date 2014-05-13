<?php

/**
 * @Entity
 * @Table(name="orderarticle")
 */
class OrderArticle extends Article
{
	/** @Column(type="integer", nullable=false) */
	private $orderid;
	
	/** @Column(type="integer", nullable=false) */
	private $quantity;
	
	public function setOrderid($price) {
		$this->orderid = $orderid;
	}

	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($price) {
		$this->quantity = $quantity;
	}

}
