<?php
namespace Models;

/**
 * @Entity
 * @Table(name="sysadmin")
 */
class AdminUser
{
	/**
	* @Id @Column(type="integer")
	* @GeneratedValue
	* @ManyToMany(targetEntity="sysUser");
	*/
	private $id;
	/** @Column(type="integer", unique=true, nullable=false) */
	private $staffnumber;
}
