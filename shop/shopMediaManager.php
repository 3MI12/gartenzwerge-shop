<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");
require_once($_SERVER['DOCUMENT_ROOT']."/shop/entity/TempImage.php");

$uploaddir = '$_SERVER['DOCUMENT_ROOT']."media/"';

function getFileHash($file) {
	$hash = hash_file('MD5', $file);
	return $filehash;
}

function getImage($filehash){
	$filehash
}

function getUserID($email) {
	global $entityManager;
	$user = $entityManager->getRepository('SysUser')->findOneBy(array('email' => $email));
	if (is_null($user)){
		return NULL;
	} else {
		$uid = $user->getUid();
		$entityManager->flush();
		return $uid;
	}
}

function createSysUser($title, $firstname, $lastname, $email, $password) {
	global $salt;
	global $iterations;
	global $entityManager;
	$uid = NULL;
	if (validateEmail($email) == false) {
		exit(10001100);
	} elseif (null !== getUserID($email)) {
		exit(10001101);
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