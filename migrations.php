<?php

$rootPath = __DIR__;
require_once $rootPath . "/vendor/autoload.php";

use app\core\Application;


$dotenv =  Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = [
 "db" => [
  "dsn" => $_ENV['DB_DSN'],
  "user" => $_ENV['DB_USER'],
  "password" => $_ENV['DB_PASSWORD'],
 ]
];

$app = new Application($rootPath, $config);

$app->db->applyMigrations();