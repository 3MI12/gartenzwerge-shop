<?php
require_once("vendor/autoload.php");
require_once("dbParms.php");

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("shop/entity");
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
