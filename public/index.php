<?php

$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\SiteController;



$app = new Application($rootPath);
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);
$app->router->get('/contact', [SiteController::class, 'contact']);
// $app->router->get('/about', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->run();