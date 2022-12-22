<?php

namespace app\controllers;

use app\core\base\BaseController;
use app\core\Request;

/**
 * 
 * @package app\controllers
 */
class SiteController extends BaseController
{
 public function home()
 {
  return $this->render('home');
 }
 public function contact()
 {
  $params = [
   "name" => "Joshua",
  ];
  return $this->render('contact', $params);
 }
 public  function handleContact(Request $request)
 {
  // $request->dd($request->all());
 }
}