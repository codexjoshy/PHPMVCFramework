<?php
$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";

use app\core\Application;


$app = new Application($rootPath);
$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->run();