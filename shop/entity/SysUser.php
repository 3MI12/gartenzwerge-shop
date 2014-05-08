<?php
require_once($_SERVER['DOCUMENT_ROOT']."/shop/shopHelper.php");
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
	
	public static function getUserByEmail($entityManager, $email)
	{
		return $entityManager->getRepository('SysUser')->findOneByEmail($email);
	}
	
	public static function buildSysUser($entityManager, $uid) {
		$email = getPostParam('email');
		if (validateEmail($email) == false) {
			$data['error'][] = "Ungültige eMail!";
			return $data;
		} 
		$sysuser = SysUser::getUserByEmail($entityManager, getPostParam('email',''));
		
		if ($sysuser->getUid() == NULL && $uid == 0) {
			// new user
			$sysuser = new SysUser();
		}elseif($uid != getPostParam('UID')){
			// wrong user
			$data['error'][] = "Du kannst nur deinen eigenen Account bearbeiten!".$sysuser->getUid().getPostParam('UID').$uid;	
			return $data;
		}
		if($sysuser->getUid() == $uid || $uid !== 0){
			$sysuser->setEmail(getPostParam('email'));
			$sysuser->setTitle(getPostParam('Title'));
			$sysuser->setFirstname(getPostParam('Firstname'));
			$sysuser->setLastname(getPostParam('Lastname'));
			if (getPostParam('password',NULL) !== NULL && $uid !== 0) {
				$sysuser->setHash(crypt(getPostParam('password'), SALT));
			}elseif ($password !== NULL && $sysuser->getUid() == $uid){
				$data['error'] = "Es wurde kein Passwort gesetzt!";
				return $data;
			}
			$entityManager->persist($sysuser);
			$entityManager->flush();
			$uid = $sysuser->getUid();
			return $sysuser;
		}else{
			$data['error'][] = "Der Nutzer konnte nicht bearbeitet oder erstellt werden!";
			return $data;
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

