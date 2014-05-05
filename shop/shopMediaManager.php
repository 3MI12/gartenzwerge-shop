<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");
require_once($_SERVER['DOCUMENT_ROOT']."/shop/entity/Article.php");

$uploaddir = '$_SERVER['DOCUMENT_ROOT']."media/"';

function getFileHash($file) {
	$hash = hash_file('MD5', $file);
	return $filehash;
}

function getImageID($articlenumber) {
	global $entityManager;
	$article = $entityManager->getRepository('Article')->findOneBy(array('articlenumber' => $articlenumber));
	if (is_null($article)){
		return NULL;
	} else {
		$imageid = $article->getUid();
		$entityManager->flush();
		return $imageid;
	}
}