<?php

define('ROOT', dirname(__FILE__));
define('BASE_PATH', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['BASE']);
require_once ROOT . '/vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request,
    Mvc\Core\MvcKernel;

$request = Request::createFromGlobals();
$kernel = new MvcKernel();
$response = $kernel->handle($request);
$response->send();
