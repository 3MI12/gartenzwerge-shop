<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");

function generateSmall($file,$name){
	$im = new Imagick($file);
	if($im->getImageWidth() > $im->getImageHeight()){
		$im->resizeImage(IMAGE_SMALL, 0, imagick::FILTER_LANCZOS, 1); 
	}else{
		$im->resizeImage(0 , IMAGE_SMALL, imagick::FILTER_LANCZOS, 1); 
	} 
	$im->setImageCompression(Imagick::COMPRESSION_JPEG);
	$im->setImageCompressionQuality(90);
	$im->writeImage(MEDIADIR.$name."-small.jpg");
	$im->clear(); 
	$im->destroy();
}

function generateMedium($file,$name){
	$im = new Imagick($file);
	if($im->getImageWidth() > $im->getImageHeight()){
		$im->resizeImage(IMAGE_MEDIUM, 0, imagick::FILTER_LANCZOS, 1); 
	}else{
		$im->resizeImage(0 , IMAGE_MEDIUM, imagick::FILTER_LANCZOS, 1); 
	} 
	$im->setImageCompression(Imagick::COMPRESSION_JPEG);
	$im->setImageCompressionQuality(90);
	$im->writeImage(MEDIADIR.$name."-medium.jpg");
	$im->clear(); 
	$im->destroy();
}

function generateLarge($file,$name){
	$im = new Imagick($file);
	if($im->getImageWidth() > $im->getImageHeight()){
		$im->resizeImage(IMAGE_BIG, 0, imagick::FILTER_LANCZOS, 1); 
	}else{
		$im->resizeImage(0 , IMAGE_BIG, imagick::FILTER_LANCZOS, 1); 
	} 
	$im->setImageCompression(Imagick::COMPRESSION_JPEG);
	$im->setImageCompressionQuality(90);
	$im->writeImage(MEDIADIR.$name."-large.jpg");
	$im->clear(); 
	$im->destroy();
}

function uploadPicture(){
	if($_FILES["file"]["type"] && $_FILES["file"]["type"]=="image/jpeg"){
		$file = $_FILES["file"]["tmp_name"];
		$name = hash_file('MD5', $file);
		generateSmall($file,$name);
		generateMedium($file,$name);
		generateLarge($file,$name);
	}else{
		$name = NULL;
		$data['error'] = "Bitte laden sie ein Bild im Format JPG hoch.";
	}
	return $name;
}
