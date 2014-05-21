<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User -> userManager
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
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
	
	/**
 	* __construct()
 	* 
 	* @author Christoph Broeckmann 2014
 	* @version 1.0
  	*/
	public function __construct() {
		$this->orders = new ArrayCollection();
	}
	
	/**
 	* Get all users.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param entityManager $entityManager
 	* @return array
 	*/
	public static function getAllUser($entityManager) {
		return $entityManager->getRepository('User')->findAll();
	}
	
	/**
 	* Get a certain user by id.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param entityManager $entityManager
 	* @param id $id
 	* @return user object
 	*/
	public static function getUserById($entityManager, $id) {
		return $entityManager->getRepository('User')->findOneById($id);
	}
	
	/**
 	* Get a certain user by email.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param entityManager $entityManager
 	* @param email $email
 	* @return user object
 	*/
	public static function getUserByEmail($entityManager, $email)
	{
		return $entityManager->getRepository('User')->findOneByEmail($email);
	}
	
	/**
 	* Register, edit and change the status of a user.
 	* 
 	* To edit you have to send per Post:
 	* $_POST['userEdit'] (value of submit button)
 	* $_POST['title'] (string)
 	* $_POST['firstname'] (string)
 	* $_POST['lastname'] (string)
 	* $_POST['email'] (string)
 	* $_POST['password'] (string)
 	* $_POST['street'] (string)
 	* $_POST['zip'] (string)
 	* $_POST['city'] (string)
 	* $_POST['bank'] (string)
 	* $_POST['bic'] (string)
 	* $_POST['iban'] (string)
 	* $_POST['phone'] (string)
 	* 
 	* 
 	* To register you have to send per Post:
 	* $_POST['userRegister'] (value of submit button)
 	* $_POST['title'] (string)
 	* $_POST['firstname'] (string)
 	* $_POST['lastname'] (string)
 	* $_POST['email'] (string)
 	* $_POST['password'] (string)
 	* 
 	* To change the status of a user you have to send per Post:
 	* $_POST['userStatus'] (value of submit button)
 	* $_POST['Status'] (string true/false)
 	* $_POST['Admin'] (string true/false)
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param entityManager $entityManager
 	* @param id $id
 	* @return array
 	*/
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
				$data['error'][] = getPostParam('email')."ist keine gültige Email-Adresse!";
				$data['success'] = false;
				return $data;
			}
			if($userPost && $userPost->getId() != $user->getId()){
				$data['error'][] = "Die Email-Adresse '".getPostParam('email')."' existiert bereits!";
				$data['success'] = false;
				return $data;
			}
			
			if($user->getId() == $id || $id == NULL){
				$user->setEmail(getPostParam('email'));
				$user->setTitle(getPostParam('title'));
				$user->setFirstname(getPostParam('firstname'));
				$user->setLastname(getPostParam('lastname'));
			
				if (getPostParam('password','') !== '') {
					if(strlen(getPostParam('password',NULL)) > 7){
						$user->setHash(crypt(getPostParam('password'), SALT));
					}else{
					$data['error'][] = "Das Passwort muss mindestens aus 8 Zeichen bestehen!";
					$data['success'] = false;
					return $data;
					}
				}
			
				if(isset($_POST['userEdit'])){
					$user->setStreet(getPostParam('street'));
					$user->setZip(getPostParam('zip'));
					$user->setCity(getPostParam('city'));
					$user->setIban(getPostParam('iban'));
					$user->setBic(getPostParam('bic'));
					$user->setBank(getPostParam('bank'));
					$user->setPhone(getPostParam('phone'));
					if(!User::checkAdmin() || $user->getId() == $id){
					$_SESSION['user'] = $user;
					}
				}
				
				if(isset($_POST['userRegister'])){
					$user->setStatus(true);
					$user->setAdmin(false);
					mail(getPostParam('email'),SUBJECT_NEWUSER,"Hallo ".getPostParam('firstname')." ".getPostParam('lastname').MESSAGE_NEWUSER,SENDER_MAIL);
					if(!User::checkAdmin()){
					$_SESSION['user'] = $user;
					}
				}
				
			$entityManager->persist($user);
			$entityManager->flush();			
			$data['success'] = true;
			$data['user'] = $user;
			}else{
				$data['error'][] = "Der Nutzer ".getPostParam('firstname')." ".getPostParam('lastname')."konnte nicht bearbeitet oder erstellt werden!";
			}
		}
		return $data;
	}
	
	 /**
 	* Login or logout of a certain user. 
 	* The user object is written to the session or overwritten by an empty user object.
 	* 
 	* To login you have to send per Post:
 	* $_POST['login']
 	* $_POST['email']
 	* $_POST['password']
 	* 
 	* To logout you have to send per Post:
 	* $_POST['logout']
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param entityManager $entityManager
 	* @return array
 	*/
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

 	/**
 	* Checks if a user is logged in.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param UserID $id
 	* @return BOOL
 	*/
	public static function loginStatus() {
		if(null !== $_SESSION['user']->getId()){
			return true;
		}else{
			return false;
		}
	}
	
	 /**
 	* Checks if an admin user is logged in.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param UserID $id
 	* @return BOOL
 	*/
	public static function checkAdmin() {
		if($_SESSION['user']->getAdmin() == true){
			return true;
		}else{
			return false;
		}
	}
	
 	/**
 	* Checks if a certain user is logged in.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param UserID $id
 	* @return BOOL
 	*/
	public static function checkUserSession($id = NULL) {
		if($_SESSION['user']->getId() == $id){
			return true;
		}else{
			return false;
		}
	}
	
	/**
 	* Checks the user profile on completeness.
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return BOOL
 	*/
	public function ableToOrder() {
		if ($this->getTitle()==''||$this->getLastname()==''||$this->getFirstname()==''||$this->getStreet()==''||$this->getIban()==''||$this->getBic()==''||$this->getBank()==''||$this->getPhone()==''){
			return false;
		}else{
			return true;
		}
	}
	
	/**
 	* get user id from session
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return id
 	*/
	public static function getSessionId() {
		return $_SESSION['user']->getId();
	}
	
	/**
 	* set user id
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	*/
	public function setId()
	{
		$this->id;
	}

	/**
 	* get user id
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return id
 	*/
	public function getId()
	{
		return $this->id;
	}

	/**
 	* set title
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param title $title
  	*/
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
 	* get title
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return title
  	*/
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
 	* set firstname
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param firstname $firstname
  	*/
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}
	
	/**
 	* get firstname
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return firstname
  	*/
	public function getFirstname()
	{
		return $this->firstname;
	}
	
	/**
 	* set lastname
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param lastname $lastname
  	*/	
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	
	/**
 	* get lastname
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return lastname
  	*/
	public function getLastname()
	{
		return $this->lastname;
	}
	
	/**
 	* get the full name
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return full name
  	*/
	public function getName() {
		return $this->firstname . ' ' . $this->lastname;
	}
	
	/**
 	* set email
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param email $email
  	*/
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	/**
 	* get email
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return email
  	*/
	public function getEmail()
	{
		return $this->email;
	}
	
	
	/**
 	* set password hash
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param hash $hash
  	*/
	public function setHash($hash)
	{
		$this->hash = $hash;
	}
	
	/**
 	* get password hash
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return hash
  	*/
	public function getHash()
	{
		return $this->hash;
	}
	
	/**
 	* set user status
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param status $status
  	*/
	public function setStatus($status)
	{
		$this->status = $status;
	}
	
	/**
 	* get user status
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return status
  	*/
	public function getStatus()
	{
		return $this->status;
	}
	
	/**
 	* set admin status
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param admin $admin
  	*/
	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}
	
	/**
 	* get admin status
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return admin
  	*/
	public function getAdmin()
	{
		return $this->admin;
	}
	
	/**
 	* set street
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param street $street
  	*/
	public function setStreet($street)
	{
		$this->street = $street;
	}
	
	/**
 	* get street
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return street
  	*/
	public function getStreet()
	{
		return $this->street;
	}
	
	
	/**
 	* set zip
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param zip $zip
  	*/
	public function setZip($zip)
	{
		$this->zip = $zip;
	}
	
	/**
 	* get zip
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return zip
  	*/
	public function getZip()
	{
		return $this->zip;
	}
	
	
	/**
 	* set city
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param city $city
  	*/
	public function setCity($city)
	{
		$this->city = $city;
	}
	
	/**
 	* get city
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return city
  	*/
	public function getCity()
	{
		return $this->city;
	}
	
	
	/**
 	* set phone
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param phone $phone
  	*/
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
	
	/**
 	* get phone
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return phone
  	*/
	public function getPhone()
	{
		return $this->phone;
	}
	
	/**
 	* set iban
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param iban $iban
  	*/
	public function setIban($iban)
	{
		$this->iban = $iban;
	}
	
	/**
 	* get iban
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return iban
  	*/
	public function getIban()
	{
		return $this->iban;
	}

	/**
 	* set bank
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param bank $bank
  	*/
	public function setBank($bank)
	{
		$this->bank = $bank;
	}
	
	/**
 	* get bank
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return bank
  	*/
	public function getBank()
	{
		return $this->bank;
	}
	
	/**
 	* set bic
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @param bic $bic
  	*/
	public function setBic($bic)
	{
		$this->bic = $bic;
	}
	
	/**
 	* get bic
 	* 
 	* @author Benjamin Brandt 2014
 	* @version 1.0
 	* 
 	* @return bic
  	*/
	public function getBic()
	{
		return $this->bic;
	}
	
	/**
 	* get orders
 	* 
 	* @author Christoph Broeckmann 2014
 	* @version 1.0
 	* 
 	* @return orders
  	*/
	public function getOrders() {
		return $this->orders;
	}
}

