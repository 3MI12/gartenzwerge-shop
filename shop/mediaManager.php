<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");
class media{
	
public static function generateSmall($file,$name){
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

public static function generateMedium($file,$name){
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

public static function generateLarge($file,$name){
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

public static function uploadPicture($file){
	if(exif_imagetype($file) == IMAGETYPE_JPEG){
		$name = hash_file('MD5', $file);
		media::generateSmall($file,$name);
		media::generateMedium($file,$name);
		media::generateLarge($file,$name);
	}else{
		$name = NULL;
		$data['error'] = "Bitte laden sie ein Bild im Format JPG hoch.";
	}
	return $name;
}
}
