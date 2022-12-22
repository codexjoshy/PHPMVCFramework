<?php

namespace app\core;

class Router
{
 public Request $request;
 public Response $response;
 protected array $routes = [];

 public function __construct(Request $request, Response $response)
 {
  $this->request = $request;
  $this->response = $response;
 }

 /**
  * get request
  *
  * @param [type] $path
  * @param [type] $callback
  * @return void
  */
 public function get($path, $callback)
 {
  $this->routes['get'][$path] = $callback;
 }

 public function resolve()
 {
  $path = $this->request->getPath();
  $method = $this->request->getMethod();
  $callback = $this->routes[$method][$path] ?? false;

  if (!$callback) {
   Application::$app->response->setStatusCode(404);

   return $this->renderView("errors/404");
  }

  if (is_string($callback)) {
   return $this->renderView($callback);
  }
  return call_user_func($callback);
 }

 /**
  * Undocumented function
  *
  * @param [type] $view
  * @return void
  */
 public function renderView($view)
 {
  $layoutContents = $this->layoutContent();
  $viewContents = $this->getViewContents($view);
  return str_replace("{{ content }}", $viewContents, $layoutContents);
  include_once Application::$ROOT_DIR . "/views/$view.php";
 }
 /**
  * Undocumented function
  *
  * @param [type] $view
  * @return void
  */
 public function renderContent($content)
 {
  $layoutContents = $this->layoutContent();
  return str_replace("{{ content }}", $content, $layoutContents);
 }

 /**
  * Undocumented function
  *
  * @return string
  */
 protected function layoutContent()
 {
  ob_start(); //caches output
  include_once Application::$ROOT_DIR . "/views/layouts/main.php";
  return ob_get_clean();
 }

 /**
  * get content of a file in the view folder
  *
  * @param [type] $view
  * @return array|string
  */
 protected function getViewContents($view): array|string
 {
  ob_start();
  include_once Application::$ROOT_DIR . "/views/$view.php";
  return ob_get_clean();
 }
}