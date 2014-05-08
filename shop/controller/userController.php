<?php
require_once __DIR__.'/../entity/User.php';

$data = null;

switch($action) {
	case 'list':
		$data['user'] =  User::getAllUser($entityManager);
		$template = 'userList';
		break;
	case 'show':
		$data['user'] = User::getUserByUid($entityManager, $id);
		$template = 'user';
		break;
	case 'edit':
		$data = User::buildUser($entityManager, $id);
		$template = empty($data['success']) ? 'userEdit' : 'user';
		$template = !empty($data['statusupdate']) ? 'userList' : $template;
		break;
	case 'login':
		$data = User::loginUser($entityManager);
		var_dump($_SESSION['user']);
		$template = 'login';
		break;
	default:
}