<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("src/Entity/");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_pgsql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'postgres',
);

$twigLoader = new Twig_Loader_Filesystem('template/');
$twig = new Twig_Environment($twigLoader, array());

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);