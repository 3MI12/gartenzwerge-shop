<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");
require_once($_SERVER['DOCUMENT_ROOT']."/shop/entity/SysUser.php");

$salt = 'dsaDSDNjsnksdnSND823NDudjsdjIWEDHSdhksdsskadiusyriweadnsjADSSAKD';
$iterations = 10000;

function createPasswordHash($hash, $salt, $iterations) {
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

function getUserID() {
	global $entityManager;
	$user = $entityManager->find('SysUser', '.');
	if (is_null($user)){
		return NULL;
	} else {
		$uid = $user->getUid();
		$entityManager->flush();
		echo "ID: ".$uid;
		return $uid;
	}
}

function createSysUser($title, $firstname, $lastname, $email, $password) {
	global $salt;
	global $iterations;
	global $entityManager;
	$uid = NULL;
	if (validateEmail($email) == false) {
		echo "Bitte geben sie eine gueltige eMail-Adresse an!";
//	} elseif (empty(getUserID($email))) {
//		echo "Die angegebene eMail-Adresse ist bereits registriert.";
	} else {
		$hash = createPasswordHash($password, $salt, $iterations);
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
		echo "Der Nutzer mit der eMail-Adresse: $email (UID: $uid) wurde mit dem Passwort: $password angelegt!";
	}
	return $uid;
}

function createUserAdmin($email, $password) {
	$uid = createSysUser($email, $password);
	// Add User $uid to Group Admin
}

function createUserShop($email, $password) {
	$uid = createSysUser($email, $password);
	// Add User $uid to Group Checkout
}

function deleteUser($email, $password) {
	$uid = getUserID($email);
	$hash = getUserHash($uid);
	if (createPasswordHash($password, $salt, $iterations) == $hash) {
		return true;
	} else {
		return false;
	}
}

function loginUser($email, $password) {
	$hash = getUserHash($uid);
	if (createPasswordHash($password, $salt, $iterations) == $hash) {
		return true;
	} else {
		return false;
	}
}