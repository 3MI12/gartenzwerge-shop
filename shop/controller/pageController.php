<?php
$data = null;
switch($action) {
	case 'impressum':
		$template = 'impressum';
		break;
	case 'contact':
		$template = 'contact';
		break;
	case 'agb':
		$template = 'agb';
		break;
	case 'start':
		$template = 'start';
		break;
	default:
		$template = '404';
}
