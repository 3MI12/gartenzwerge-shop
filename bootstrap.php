<?php
require_once("vendor/autoload.php");
require_once("config/dbParms.php");
require_once 'config/config.php';
require_once 'shop/shopHelper.php';
require_once 'shop/mediaManager.php';
require_once 'shop/entity/Article.php';
require_once 'shop/entity/OrderArticle.php';
require_once 'shop/entity/User.php';
require_once 'shop/entity/Order.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("shop/entity");
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
