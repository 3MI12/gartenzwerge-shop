<?php
$data = array();

switch($action) {
	case 'list':
		$data['article'] = Order::getAll($entityManager);
		$template = 'orderList';
		break;
	case 'show':
		$data = $_SESSION['order']->getOrderData();
		$template = 'order';
		break;
	case 'edit':
		$data = $_SESSION['order']->add($entityManager);
		$template = 'order';
		break;
	case 'order':
		$data = $_SESSION['order']->finalize($entityManager);
		$template = 'order';
		break;
	default:
		$template = '404';
}
