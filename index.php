<?php

session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

echo '<pre>';
var_dump('$_GET:', $_GET, '$_POST:', $_POST);
echo '</pre>';

require_once 'bootstrap.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;


switch($controller) {
	case 'article':
		require 'shop/controller/articleController.php';
		break;
	case 'user':
		require 'shop/controller/userController.php';
		break;
	default:
		die("No controller found for ".htmlspecialchars($_SERVER['REQUEST_URI']));
}