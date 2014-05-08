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
	* @OneToOne(targetEntity="adminUser");
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

	/** @Column(type="string", length=300) */
	private $hash;
	
	public static function getAll($entityManager) {
		return $entityManager->getRepository('SysUser')->findAll();
	}
	
	public function getUserByEmail($entityManager, $email)
	{
		return $entityManager->getRepository('SysUser')->findOneByEmail($email);
	}
	
	public function buildSysUser($entityManager, $title, $firstname, $lastname, $email, $password, $uid = NULL) {
		if (validateEmail($email) == false) {
			return(false);
		} 
		
		$sysuser = getUserByEmail($entityManager, $email);
		
		if ($sysuser->getUid() !== NULL) {
			//email exist
			$status = 0;
		}elseif($sysuser->getUid() == $uid){
			//existing user
			$status = 1;
		}else{
			return(false);
		}
		
		if ($status = 0){


			try
			{
			$sysuser = new SysUser();
			$sysuser->setUid();
			$sysuser->setEmail($email);
			$sysuser->setHash(crypt($password, SALT));
			$sysuser->setTitle($title);
			$sysuser->setFirstname($firstname);
			$sysuser->setLastname($lastname);
			$entityManager->persist($sysuser);
			$entityManager->flush();
			$uid = $sysuser->getUid();
			}
			catch ( Doctrine_Connection_Exception $e )
			{
			    echo 'Code : ' . $e->getPortableCode();
			    echo 'Message : ' . $e->getPortableMessage();
			}
			return $uid;
		}
	}

	public function editSysUser($entityManager, $uid, $title, $firstname, $lastname, $email, $password) {
		if (validateEmail($email) == false) {
			return(false);
		} elseif (getUserID($entityManager, $email) !== $uid) {
			return(false);
		} else {
			try
			{
			$sysuser = $entityManager->getRepository('SysUser')->findOneByUid($uid);
			$sysuser->setEmail($email);
			$sysuser->setHash(crypt($password, SALT));
			$sysuser->setTitle($title);
			$sysuser->setFirstname($firstname);
			$sysuser->setLastname($lastname);
			$entityManager->persist($sysuser);
			$entityManager->flush();
			}
			catch ( Doctrine_Connection_Exception $e )
			{
			    echo 'Code : ' . $e->getPortableCode();
			    echo 'Message : ' . $e->getPortableMessage();
			}
			return true;
		}
	}

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
	
	public function getUserHash($entityManager, $uid) {
		$user = $entityManager->find("Sysuser", (int)$uid);
		$hash = $user->getHash();
		return $hash;
	}
}

