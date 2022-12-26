<?php

namespace app\core\base;

use app\core\Application;

class BaseController
{
 /**
  * Undocumented variable
  *
  * @var string
  */
 public string $layout = "main";

 /**
  * used to set layout
  *
  * @param [type] $layout
  * @return void
  */
 public function setLayout($layout)
 {
  $this->layout = $layout;
 }

 /**
  * used to get application layout
  *
  * @return string
  */
 public function getLayout(): string
 {
  return $this->layout;
 }



 public function render(string $view, $params = [])
 {
  return Application::$app->router->renderView($view, $params);
 }
}