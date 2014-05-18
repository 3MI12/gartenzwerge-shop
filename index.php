<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

require_once 'bootstrap.php';

session_start();
if (isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > 3600)) {
    session_unset();
    session_destroy();
}
$_SESSION['activity'] = time();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : new User();
$_SESSION['order'] = isset($_SESSION['order']) ? $_SESSION['order'] : new Order();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'article';
$action = isset($_GET['action']) ? $_GET['action'] : ($controller == 'article' ? 'list' : null);
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;


switch($controller) {
	case 'article':
		require 'shop/controller/articleController.php';
		break;
	case 'user':
		require 'shop/controller/userController.php';
		break;
	case 'order':
		require 'shop/controller/orderController.php';
		break;
	case 'page':
		require 'shop/controller/pageController.php';
		break;
	default:
		$template = '404';
}

//echo '<pre>'; var_dump($data); echo '</pre>';

if(!empty($data['redirect'])) {
	header('Location: http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['HTTP_HOST'] . $data['redirect']);
	exit;
}

require (TEMPLATE_PATH.'documentheader.php');
require (TEMPLATE_PATH.'body.php');
