<?php
require_once __DIR__.'/../entity/SysUser.php';

$data = null;

switch($action) {
	case 'list':
		$data = SysUser::getAll($entityManager);
		var_dump($data);
		//$template = 'userList';
		break;
	case 'show':
		$data = SysUser::getById($entityManager, $email);
		var_dump($data);
		// $template = 'user';
		break;
	case 'edit':
		$data = SysUser::editCreate($entityManager, $id);
		echo $data;
		//$template = 'userEdit';
		break;
	default:
}