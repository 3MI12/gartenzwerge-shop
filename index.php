<?php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/shop/entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'gartenzwerge',
    'password' => '9kpWWdlPuaJ0Qm',
    'dbname'   => 'gartenzwerge',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);

$classes = array(
  $entityManager->getClassMetadata(get_class($paths)),
);

$tool->createSchema($classes);
