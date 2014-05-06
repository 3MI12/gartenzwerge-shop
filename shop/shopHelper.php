<?php
function validateEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if(checkdnsrr(array_pop(explode("@",$email)),"MX")){
        	return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}