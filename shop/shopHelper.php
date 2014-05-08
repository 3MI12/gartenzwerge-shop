<?php
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