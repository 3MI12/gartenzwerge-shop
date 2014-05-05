<?php
require_once __DIR__.'/../entity/Article.php';

$data = null;

switch($action) {
	case 'list':
		$data = Article::getAll($entityManager);
		break;
	case 'show':
		$data = Article::getById($entityManager, $id);
		break;
	default:
}

echo '<pre>';
var_dump($data);
echo '</pre>';