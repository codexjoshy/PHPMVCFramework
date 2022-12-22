<?php

namespace app\core;

use const PHPSTORM_META\ANY_ARGUMENT;

class Request
{

 /**
  * get current path from server
  *
  * @return string
  */
 public function getPath(): string
 {
  $path = $_SERVER['REQUEST_URI'] ?? '/';
  $position = strpos($path, "?");
  if (!$position) return $path;
  $path = substr($path, 0, $position);
  return $path;
 }

 /**
  * get current server request method
  *
  * @return string
  */
 public function getMethod(): string
 {
  return strtolower($_SERVER['REQUEST_METHOD']);
 }

 public function all()
 {
  $body = [];
  if ($this->getMethod() == 'get') {
   foreach ($_GET as $key => $value) $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if ($this->getMethod() == 'post') {
   foreach ($_POST as $key => $value) $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
  }

  return $body;
 }

 public function dd()
 {
  echo '<pre>';
  var_dump(func_get_args());
  echo '</pre>';
  exit;
 }
}