<?php
$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";

use app\controllers\SiteController;
use app\core\Application;


$app = new Application($rootPath);
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->run();