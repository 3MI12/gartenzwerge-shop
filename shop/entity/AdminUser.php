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
	*/
        private $staffnumber;
	/** @Column(type="integer", unique=true, nullable=false)
	 * @OneToOne(targetEntity="SysUser");
	 */
	private $uid;
}
