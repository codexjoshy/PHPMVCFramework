<?php

$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\SiteController;

$dotenv =  Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();
$config = [
 "userClass" => \app\models\User::class,
 "db" => [
  "dsn" => $_ENV['DB_DSN'],
  "user" => $_ENV['DB_USER'],
  "password" => $_ENV['DB_PASSWORD'],
 ]
];


$app = new Application($rootPath, $config);
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);
$app->router->get('/login', [AuthController::class, 'loginForm']);
$app->router->post('/login', [AuthController::class, 'handleLogin']);
$app->router->get('/logout', [AuthController::class, 'handleLogout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
// $app->router->get('/about', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->run();