<?php

switch($action) {
	case 'list':
		$data = Article::getAll($entityManager);
		$template = 'articleList';
		break;
	case 'show':
		$data['article'] = Article::getById($entityManager, $id);
		$template = 'article';
		break;
	case 'edit':
		if(User::checkAdmin()){
		$data = Article::editCreate($entityManager, $id);
		$template = empty($data['success']) ? 'articleEdit' : 'article';
		}else{
			$data['error'][] = "Bitte melden sie sich als Admin an!";
			$template = 'errorList';
		}
		break;
	default:
		$template = '404';
}
