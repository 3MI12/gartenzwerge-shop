<?php
/**
 * Class Media - the MediaManager
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 */
class Media{

/**
 * Generated with imagick a small image and save it under "/media." 
 * 
 * The size is defined in the config file "/config/config.php".
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
 * @param file-path $file
 * @param file-name $name
 */	
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

/**
 * Generated with imagick a medium image and save it under "/media." 
 * 
 * The size is defined in the config file "/config/config.php".
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
 * @param file-path $file
 * @param file-name $name
 */
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

/**
 * Generated with imagick a large image and save it under "/media." 
 * 
 * The size is defined in the config file "/config/config.php".
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
 * @param file-path $file
 * @param file-name $name
 */
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

/**
 * Generate an MD5-file-hash based filename for uploaded pictures and checks the image format.
 *  
 * Allowed exif_imagetype is "IMAGETYPE_JPEG"
 * 
 * @author Benjamin Brandt 2014
 * @version 1.0
 * 
 * @param file-path $file
 * @return MD5-file-hash
 */
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
