<?php
/**
 * Validates email addresses on the php_filter and a reverseDNS check.
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
 * @param email adress $email
 * @return BOOL
 */
function validateEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$domain = explode("@",$email);
		if(checkdnsrr(array_pop($domain),"MX")){
        	return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function getPostParam($name, $defaultValue = null) {
	return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
}

function sendOrderConfirmMail($order, $user) {
	$mailData = require TEMPLATE_PATH . 'orderConfirmMail.php';
	$sent = mail($user->getEmail(), SUBJECT_ORDER, $mailData, 'Content-type: text/html; charset=utf-8'. "\r\n" .SENDER_MAIL);
}
