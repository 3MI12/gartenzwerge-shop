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
	case 'update':
		$data = Article::createUpdate($entityManager);
		break;
	case 'create':
		$data = Article::createUpdate($entityManager);
		break;
	default:
}