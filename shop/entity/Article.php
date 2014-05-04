<?php
namespace Models;

/**
 * @Entity
 * @Table(name="article")
 */
class Article
{
	/** @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false) */
	private $id;
	/** @Column(type="string", length=10, unique=true, nullable=false) */
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
	/** @Column(type="decimal", precision=2, nullable=false) */
	private $price;
	/** @Column(type="decimal", precision=2, nullable=false) */
	private $vat;
	/** @Column(type="integer", nullable=false) */
	private $inventory;
	/** @Column(type="string", length=12, nullable=false) */
	private $category;

	
}
