<?php
require_once __DIR__.'/../entity/Article.php';

$data = null;

switch($action) {
	case 'list':
		$data = Article::getAll($entityManager);
		$template = 'articleList';
		break;
	case 'show':
		$data = Article::getById($entityManager, $id);
		$template = 'article';
		break;
	case 'edit':
		$data = Article::editCreate($entityManager, $id);
		$template = 'articleEdit';
		break;
	default:
}