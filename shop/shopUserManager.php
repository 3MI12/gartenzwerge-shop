<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");
require_once($_SERVER['DOCUMENT_ROOT']."/shop/entity/SysUser.php");

function createPasswordHash($hash, $iterations = 10000, $salt = 'dsaDSDNjsnksdnSND823NDudjsdjIWEDHSdhksdsskadiusyriweadnsjADSSAKD') {
	for ($x=0; $x<$iterations; $x++) {
		$hash = hash('sha512', $hash . $salt);
	}
	return $hash;
}

function validateEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if(checkdnsrr(array_pop(explode("@",$email)),"MX")){
        	return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function getUserID($email) {
	global $entityManager;
	$user = $entityManager->getRepository('SysUser')->findOneBy(array('email' => $email));
	if (is_null($user)){
		return(10001000);
	} else {
		$uid = $user->getUid();
		$entityManager->flush();
		return $uid;
	}
}

function getUserHash($uid) {
	global $entityManager;
	echo "..";
	$user = $entityManager->find("Sysuser", (int)$uid);
	var_dump($user);
	$hash = $user->getHash();
	return $hash;
}

function deleteUser($email, $password) {
	$uid = getUserID($email);
	
	if($uid < 10000000){
		$hash = getUserHash($uid);
	} else {
		return false;
	}
	
	if (createPasswordHash($password, $salt, $iterations) == $hash) {
		return true;
	} else {
		return false;
	}
}

function createSysUser($title, $firstname, $lastname, $email, $password) {
	global $entityManager;
	if (validateEmail($email) == false) {
		return(10001100);
	} elseif (getUserID($email) <= 10000000) {
		return(10001101);
	} else {
		$hash = createPasswordHash($password);
		try
		{
		$sysuser = new SysUser();
		$sysuser->setUid();
		$sysuser->setEmail($email);
		$sysuser->setHash($hash);
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

function loginUser($email, $password) {
	$uid = getUserID($email);
	if($uid <= 10000000){
		$hash = getUserHash($uid);
		$newhash = createPasswordHash($password);
		if ($newhash == $hash) {
			echo "JUHU!";
			return true;
		} else {
			echo "WRONG PASSWORD!";
			return false;
		}
	} else {
		echo "USER DOES NOT EXIST!";
		return false;
	}
}

function createUserAdmin($email, $password) {
	$uid = createSysUser($email, $password);
	// Add User $uid to Group Admin
}

function createUserShop($email, $password) {
	$uid = createSysUser($email, $password);
	// Add User $uid to Group Checkout
}