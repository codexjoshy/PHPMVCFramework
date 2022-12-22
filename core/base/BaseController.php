<?php

namespace app\core\base;

use app\core\Application;

class BaseController
{
 public function render(string $view, $params = [])
 {
  return Application::$app->router->renderView($view, $params);
 }
}