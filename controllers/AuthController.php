<?php

namespace app\controllers;

use app\core\Application;
use app\core\base\BaseController;
use app\core\Request;
use app\models\User;

class AuthController extends BaseController
{
 public function register(Request $request)
 {
  $register = new User();
  $this->setLayout('auth');
  return $this->render('auth/register', ["model" => $register]);
 }
 public function handleRegister2(Request $request)
 {
  $data = $request->validate([
   "email" => "required|string",
   "name" => "required|string",
   "phone" => "required|integer",
   "password" => "required"
  ]);

  if ($data['error']) {
  }
  $register = new Register();
  $request->dd($request->all());
 }
 public function handleRegister(Request $request)
 {
  $user = new User();
  $user->loadData($request->all());

  if ($user->validate() && $user->save()) {

   Application::$app->response->redirect('/');
  }
  $this->setLayout('auth');
  return $this->render('auth/register', ['model' => $user]);
 }
}