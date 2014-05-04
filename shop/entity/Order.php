<?php
namespace Models;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="order")
 */
class Order {
	/** @Id @GeneratedValue @Column(type="integer", unique=true, nullable=false) */
	private $id;
	/**
     * @OneToMany(targetEntity="article", mappedBy="reporter")
	 * @var Article[]
     **/
	private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
	
	public function addArticle($article) {
		$this->articles[] = $article;
	}
}
