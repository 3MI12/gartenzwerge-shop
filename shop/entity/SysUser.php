<?php
/**
 * @Entity
 * @Table(name="sysuser")
 */
class SysUser
{
	/**
	* @Id @Column(type="integer")
	* @GeneratedValue
	* @ManyToMany(targetEntity="adminUser");
	*/
	private $uid;

	/** @Column(type="string", length=5) */
	private $title;

	/** @Column(type="string", length=20) */
	private $firstname;

	/** @Column(type="string", length=20) */
	private $lastname;

	/** @Column(type="string", length=50, unique=true, nullable=false) */
	private $email;

	/** @Column(type="string", length=100) */
	private $hash;

	public function setUid()
	{
		$this->uid;
	}

	public function getUid()
	{
		return $this->uid;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}
	
	public function getFirstname()
	{
		return $this->firstname;
	}
	
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	
	public function getLastname()
	{
		return $this->lastname;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setHash($hash)
	{
		$this->hash = $hash;
	}
	
	public function getHash()
	{
		return $this->hash;
	}
}

