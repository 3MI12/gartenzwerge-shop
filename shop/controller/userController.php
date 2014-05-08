<?php
require_once __DIR__.'/../entity/SysUser.php';

$data = null;

switch($action) {
	case 'list':
		$data = SysUser::getAll($entityManager);
		$template = 'userList';
		break;
	case 'show':
		$data = SysUser::getById($entityManager, $email);
		$template = 'userShow';
		break;
	case 'edit':
		$data = SysUser::editCreate($entityManager, $id);
		$template = 'userEdit';
		break;
	case 'delete':
		$data = SysUser::deleteSysuser($entityManager, $email);
		$template = 'userDelete';
		break;
	default:
}