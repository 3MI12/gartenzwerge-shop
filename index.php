<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

session_start();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$_SESSION['order'] = isset($_SESSION['order']) ? $_SESSION['order'] : null;

require_once 'bootstrap.php';
require_once 'config/config.php';

echo '<pre>'; var_dump($_GET, $_POST); echo '</pre>';

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
	case 'page':
		require 'shop/controller/pageController.php';
		break;
	default:
		$template = '404';
}

require (TEMPLATE_PATH.'index.php');

?>
