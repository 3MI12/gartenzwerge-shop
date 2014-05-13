<?php
require_once __DIR__.'/../entity/User.php';

$data = null;

switch($action) {
	case 'list':
		if(User::checkAdmin()){
			$data['user'] =  User::getAllUser($entityManager);
			$template = 'userList';
		}else{
			$data['error'][] = "Bitte melden sie sich als Admin an!";
			$template = 'errorList';
		}
		break;
	case 'show':
		if(User::checkUserSession($id) || User::checkAdmin()){
			$data['user'] = User::getUserById($entityManager, $id);
			$template = 'user';
		}else{
			$data['error'][] = "Sie können nur ihr eigenes Profil anzeigen!";
			$template = 'errorList';
		}
		break;
	case 'edit':
		if(User::checkUserSession($id) || User::checkAdmin()){
			$data = User::buildUser($entityManager, $id);
			$template = empty($data['success']) ? 'userEdit' : 'user';
			$template = !empty($data['statusupdate']) ? 'userList' : $template;
		}else{
			$data['error'][] = "Sie können nur ihr eigenes Profil bearbeiten!";
			$template = 'errorList';
		}
		break;
	case 'login':
		if(User::loginStatus() && !isset($_POST['logout'])){
			$data['user'] = User::getUserById($entityManager, User::getSessionId());
			$template = 'userProfile';
		}elseif(isset($_POST['login'])){
			$data = User::loginUser($entityManager);
			$data['user'] = User::getUserById($entityManager, User::getSessionId());
			$template = 'userProfile';			
		}else{
			$data = User::loginUser($entityManager);
			$template = 'login';
		}
		break;
	default:
		$template = '404';
}
