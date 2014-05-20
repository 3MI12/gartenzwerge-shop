<?php
$data = array();

switch($action) {
	case 'list':
		$data = Order::getAllByUser($entityManager);
		$template = 'orderList';
		break;
	case 'listall':
		$data = Order::getAll($entityManager);
		$template = 'orderList';
		break;
	case 'detail':
		$data = Order::getById($entityManager, $id);
		$template = 'orderDetail';
		break;
	case 'cancel':
		($order = $entityManager->getRepository('Order')->findOneById($id))
			&& ($data = $order->cancel($entityManager));
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
