<?php
require_once __DIR__.'/../entity/User.php';

$data = null;
switch($action) {
	case 'list':
		if(User::checkAdmin()){
			$data['user'] =  User::getAllUser($entityManager);
			$template = 'userList';
		}else{
			$_SESSION['messages'][] = "Bitte melden sie sich als Admin an!";
			$data['redirect'] = "/user/login/";
		}
		break;
	case 'show':
		if(User::checkUserSession($id) || User::checkAdmin()){
			$data['user'] = User::getUserById($entityManager, $id);
			$template = 'user';
		}else{
			$_SESSION['messages'][] = "Sie können nur ihr eigenes Profil anzeigen!";
			$data['redirect'] = "/user/login/";
		}
		break;
	case 'edit':
		if(User::checkUserSession($id) || User::checkAdmin()){
			$data = User::buildUser($entityManager, $id);
			$template = empty($data['success']) ? 'userEdit' : 'user';
			$template = !empty($data['statusupdate']) ? 'userList' : $template;
			$template = (isset($_POST['userRegister']) && !User::loginStatus()) ? 'login' : $template;
		}else{
			$_SESSION['messages'][] = "Sie können nur ihr eigenes Profil bearbeiten!";
			$data['redirect'] = "/user/login/";
		}
		break;
	case 'login':
		if(User::loginStatus() && !$_SESSION['user']->ableToOrder()){
			$data['error'][] = "Bitte vervollständigen Sie ihr Profil um Bestellungen tätigen zu können!";
		}
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
