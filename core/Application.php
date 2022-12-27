<?php

namespace app\core;

use app\core\base\BaseController;

class Application
{
 /**
  * Undocumented variable
  *
  * @var string
  */
 public static string $ROOT_DIR;
 /**
  * Undocumented variable
  *
  * @var Router
  */
 public Router $router;
 /**
  * Undocumented variable
  *
  * @var Request
  */
 public Request $request;
 /**
  * Undocumented variable
  *
  * @var Response
  */
 public Response $response;
 /**
  * Undocumented variable
  *
  * @var Session
  */
 public Session $session;

 /**
  * Undocumented variable
  *
  * @var Application
  */
 public static Application $app;

 /**
  * Undocumented variable
  *
  * @var Database
  */
 public Database $db;

 public BaseController $controller;

 public function __construct($rootPath, array $config)
 {
  self::$ROOT_DIR = $rootPath;
  self::$app = $this;
  $this->request = new Request;
  $this->response = new Response;
  $this->session = new Session;
  $this->router = new Router($this->request, $this->response);

  $this->db = new Database($config['db']);
 }
 public function getController(): BaseController
 {
  return $this->controller;
 }

 /**
  * Undocumented function
  *
  * @return void
  */
 public function setController(BaseController $controller): void
 {
  $this->controller = $controller;
 }

 public function run()
 {
  echo $this->router->resolve();
 }
}