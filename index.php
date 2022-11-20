<?php
session_start();
/*include_once ("configuration/Configuration.php");
$configuration = new Configuration();
$router = $configuration->getRouter();

$router->redirect($_GET['controller'], $_GET['method']);*/

include_once("configuration/Configuration.php");

$controller = isset($_GET["controller"]) ? $_GET["controller"] : "content" ;
$method = isset($_GET["method"]) ? $_GET["method"] : "list" ;

$configuration = new Configuration();
$router = $configuration->getRouter( "content", "list");

$router->redirect($controller,$method);
