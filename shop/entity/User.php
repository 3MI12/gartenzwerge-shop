<?php
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
	
	/** @Column(type="string", length=100) */
	private $street;
	
	/** @Column(type="string", length=5) */
	private $zip;
	
	/** @Column(type="string", length=60) */
	private $city;
	
	/** @Column(type="string", length=60) */
	private $phone;
	
	/** @Column(type="string", length=20) */
	private $iban;
	
	/** @Column(type="string", length=20) */
	private $bic;
	
	/** @Column(type="string", length=60) */
	private $bank;
	
	/** @Column(type="boolean") */
	private $admin;
	
	/** @Column(type="boolean") */
	private $status;
	
	public static function getAllUser($entityManager) {
		return $entityManager->getRepository('User')->findAll();
	}
	
	public static function getUserByUid($entityManager, $id) {
		return $entityManager->getRepository('User')->findOneByUid($id);
	}
	
	public static function getUserByEmail($entityManager, $email)
	{
		return $entityManager->getRepository('User')->findOneByEmail($email);
	}
	
	public static function buildUser($entityManager, $uid = NULL) {
		$user = $entityManager->getRepository('User')->findOneByUid($uid);
		$data['user'] = $user;
		if(!$user){
			$user = new user();
		}
		
		if(isset($_POST['userStatus'])){
			$user->setStatus(getPostParam('Status',false));
			$user->setAdmin(getPostParam('Admin',false));
			$entityManager->persist($user);
			$entityManager->flush();
			$data['statusupdate'] = true;
			$data['user'] = User::getAllUser($entityManager);
		}

		if(isset($_POST['userEdit'])){
			$userPost = user::getUserByEmail($entityManager, getPostParam('email',''));
			
			$email = getPostParam('email');
			if (validateEmail($email) == false) {
				$data['error'][] = "Ungültige eMail!";
				return $data;
			}
			if($userPost && $userPost->getUid() != $user->getUid()){
				$data['error'][] = "Die eingegebene eMail-Adresse existiert bereits!";
				return $date;
			}
			
			if($uid != getPostParam('UID')){
				// wrong user
				$data['error'][] = "Du kannst nur deinen eigenen Account bearbeiten!".$user->getUid().getPostParam('UID').$uid;	
				return $data;
			}
			
		if($user->getUid() == $uid || $uid !== NULL){
			$user->setEmail(getPostParam('email'));
			$user->setTitle(getPostParam('Title'));
			$user->setFirstname(getPostParam('Firstname'));
			$user->setLastname(getPostParam('Lastname'));
			if(getPostParam('Street')){
			$user->setStreet(getPostParam('Street'));
			}
			if(getPostParam('ZIP')){
			$user->setZip(getPostParam('ZIP'));
			}
			if(getPostParam('City')){
			$user->setCity(getPostParam('City'));
			}
			if(getPostParam('IBAN')){
			$user->setIban(getPostParam('IBAN'));
			}
			if(getPostParam('BIC')){
			$user->setBic(getPostParam('BIC'));
			}	
			if(getPostParam('Bank')){
			$user->setBank(getPostParam('Bank'));
			}
			if(getPostParam('Phone')){
			$user->setPhone(getPostParam('Phone'));
			}
			if (getPostParam('password',NULL) !== NULL && $uid !== 0) {
				$user->setHash(crypt(getPostParam('password'), SALT));
			}elseif ($password !== NULL && $user->getUid() == $uid){
				$data['error'] = "Es wurde kein Passwort gesetzt!";
				return $data;
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
		$user = $entityManager->getRepository('User')->findOneByEmail(getPostParam('email'));
		if(!$user && $user->getStatus() && crypt(getPostParam('password'), SALT) == $user->getHash()){
			$data['success'] = true;
			$_SESSION['user'] = $user;
		}else{
			$data['success'] = false;
		}
		return $data;
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
}

