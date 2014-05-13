<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

require_once 'bootstrap.php';
require_once 'config/config.php';
require_once 'shop/shopHelper.php';
require_once 'shop/entity/Article.php';
require_once 'shop/entity/OrderArticle.php';
require_once 'shop/entity/User.php';
require_once 'shop/entity/Order.php';

session_start();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : new User();
$_SESSION['order'] = isset($_SESSION['order']) ? $_SESSION['order'] : new Order();

//echo '<pre>'; var_dump($_GET, $_POST, $_SERVER); echo '</pre>'; exit;

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

if(!empty($data['redirect'])) {
	header('Location: http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['HTTP_HOST'] . $data['redirect']);
	exit;
}

require (TEMPLATE_PATH.'documentheader.php');
require (TEMPLATE_PATH.'body.php');
