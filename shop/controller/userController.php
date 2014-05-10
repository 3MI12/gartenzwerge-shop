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
			echo "Bitte melden sie sich als Admin an!";
			$template = '';
		}
		break;
	case 'show':
		$data['user'] = User::getUserByUid($entityManager, $id);
		$template = 'user';
		break;
	case 'edit':
		if(User::checkUserSession($id) || User::checkAdmin()){
			$data = User::buildUser($entityManager, $id);
		}else{
			$data['error'][] = "Sie können nur ihr eigenes Profil bearbeiten!";
			echo "Sie können nur ihr eigenes Profil bearbeiten!";
		}
		$template = empty($data['success']) ? 'userEdit' : 'user';
		$template = !empty($data['statusupdate']) ? 'userList' : $template;
		break;
	case 'login':
		if(User::loginStatus() && !isset($_POST['logout'])){
			$data['user'] = User::getUserByUid($entityManager, User::getSessionUid());
			$template = 'userProfile';
		}elseif(isset($_POST['login'])){
			$data = User::loginUser($entityManager);
			$data['user'] = User::getUserByUid($entityManager, User::getSessionUid());
			$template = 'userProfile';			
		}else{
			$data = User::loginUser($entityManager);
			$template = 'login';
		}
		break;
	default:
}