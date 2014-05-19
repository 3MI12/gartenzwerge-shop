<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
	/**
	* @Id @Column(type="integer")
	* @GeneratedValue
	*/
	private $id;

	/** @Column(type="string", length=5, nullable=true) */
	private $title;

	/** @Column(type="string", length=20, nullable=false) */
	private $firstname;

	/** @Column(type="string", length=20, nullable=false) */
	private $lastname;

	/** @Column(type="string", length=50, unique=true, nullable=false) */
	private $email;

	/** @Column(type="string", length=300, nullable=false) */
	private $hash;
	
	/** @Column(type="string", length=100, nullable=true) */
	private $street;
	
	/** @Column(type="string", length=5, nullable=true) */
	private $zip;
	
	/** @Column(type="string", length=60, nullable=true) */
	private $city;
	
	/** @Column(type="string", length=60, nullable=true) */
	private $phone;
	
	/** @Column(type="string", length=20, nullable=true) */
	private $iban;
	
	/** @Column(type="string", length=20, nullable=true) */
	private $bic;
	
	/** @Column(type="string", length=60, nullable=true) */
	private $bank;
	
	/** @Column(type="boolean", nullable=false) */
	private $admin;
	
	/** @Column(type="boolean", nullable=false) */
	private $status;
	
	/**
	 * @OneToMany(targetEntity="Order", mappedBy="user", cascade={"all"})
	*/
	private $orders;
	
	public function __construct() {
		$this->orders = new ArrayCollection();
	}
	
	public static function getAllUser($entityManager) {
		return $entityManager->getRepository('User')->findAll();
	}
	
	public static function getUserById($entityManager, $id) {
		return $entityManager->getRepository('User')->findOneById($id);
	}
	
	public static function getUserByEmail($entityManager, $email)
	{
		return $entityManager->getRepository('User')->findOneByEmail($email);
	}
	
	public static function buildUser($entityManager, $id = NULL) {
		$user = $entityManager->getRepository('User')->findOneById($id);
		$data['user'] = $user;
		if(!$user){
			$user = new User();
		}
		
		if(isset($_POST['userStatus'])){
			switch(getPostParam('Status')) {
				case 'true':
					$user->setStatus(true);
					break;
				case 'false':
					$user->setStatus(false);
					break;
				default:
			}
			switch(getPostParam('Admin')) {
				case 'true':
					$user->setAdmin(true);
					break;
				case 'false':
					$user->setAdmin(false);
					break;
				default:
			}
			$entityManager->persist($user);
			$entityManager->flush();
			$data['statusupdate'] = true;
			$data['user'] = User::getAllUser($entityManager);
		}
		
		if(isset($_POST['userEdit']) || isset($_POST['userRegister'])){
			$userPost = User::getUserByEmail($entityManager, getPostParam('email',''));
			if (validateEmail(getPostParam('email')) == false) {
				$data['error'][] = "Ungültige eMail!";
				return $data;
			}
			if($userPost && $userPost->getId() != $user->getId()){
				$data['error'][] = "Die eingegebene eMail-Adresse existiert bereits!";
				return $data;
			}
			
			if($user->getId() == $id || $id == NULL){
				$user->setEmail(getPostParam('email'));
				$user->setTitle(getPostParam('title'));
				$user->setFirstname(getPostParam('firstname'));
				$user->setLastname(getPostParam('lastname'));
			
				if (getPostParam('password',NULL) !== NULL) {
					$user->setHash(crypt(getPostParam('password'), SALT));
				}
			
				if(isset($_POST['userEdit'])){
					$user->setStreet(getPostParam('street'));
					$user->setZip(getPostParam('zip'));
					$user->setCity(getPostParam('city'));
					$user->setIban(getPostParam('iban'));
					$user->setBic(getPostParam('bic'));
					$user->setBank(getPostParam('bank'));
					$user->setPhone(getPostParam('phone'));
				}
				
				if(isset($_POST['userRegister'])){
					$user->setStatus(true);
					$user->setAdmin(false);
					mail(getPostParam('email'),SUBJECT_NEWUSER,"Hallo ".getPostParam('firstname')." ".getPostParam('lastname').MESSAGE_NEWUSER,SENDER_MAIL);
					if(!checkAdmin()){
					$_SESSION['user'] = $user;
					}
				}
				
			$entityManager->persist($user);
			$entityManager->flush();
						
			$data['success'] = true;
			$data['user'] = $user;
			}else{
				$data['error'][] = "Der Nutzer konnte nicht bearbeitet oder erstellt werden!";
			}
		}
		return $data;
	}
	
	public static function loginUser($entityManager) {
		$data = NULL;
		if(isset($_POST['login'])){
			$user = $entityManager->getRepository('User')->findOneByEmail(getPostParam('email'));
			if($user && $user->getStatus() && crypt(getPostParam('password'), SALT) == $user->getHash()){
				$data['success'] = true;
				$_SESSION['user'] = $user;
			}else{
				$data['success'] = false;
			}
		}
		if(isset($_POST['logout'])){
			$_SESSION['user'] = new User();
			$data['success'] = true;
		}
		return $data;
	}

	public static function loginStatus() {
		if(null !== $_SESSION['user']->getId()){
			return true;
		}else{
			return false;
		}
	}
	
	public static function checkAdmin() {
		if($_SESSION['user']->getAdmin() == true){
			return true;
		}else{
			return false;
		}
	}
	
	public static function checkUserSession($id = NULL) {
		if($_SESSION['user']->getId() == $id){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getSessionId() {
		return $_SESSION['user']->getId();
	}
	
	public function setId()
	{
		$this->id;
	}

	public function getId()
	{
		return $this->id;
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
	
	public function getName() {
		return $this->firstname . ' ' . $this->lastname;
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
	
	public function setStatus($status)
	{
		$this->status = $status;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}
	
	public function getAdmin()
	{
		return $this->admin;
	}
	
	public function setStreet($street)
	{
		$this->street = $street;
	}
	
	public function getStreet()
	{
		return $this->street;
	}
	
	public function setZip($zip)
	{
		$this->zip = $zip;
	}
	
	public function getZip()
	{
		return $this->zip;
	}
	
	public function setCity($city)
	{
		$this->city = $city;
	}
	
	public function getCity()
	{
		return $this->city;
	}
	
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
	
	public function getPhone()
	{
		return $this->phone;
	}
	
	public function setIban($iban)
	{
		$this->iban = $iban;
	}
	
	public function getIban()
	{
		return $this->iban;
	}

	public function setBank($bank)
	{
		$this->bank = $bank;
	}
	
	public function getBank()
	{
		return $this->bank;
	}
	
	public function setBic($bic)
	{
		$this->bic = $bic;
	}
	
	public function getBic()
	{
		return $this->bic;
	}
	
	public function getOrders() {
		return $this->orders;
	}
}

