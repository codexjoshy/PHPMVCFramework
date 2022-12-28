<?php

namespace app\controllers;

use app\core\Application;
use app\core\base\BaseController;
use app\core\Request;
use app\core\Response;
use app\models\Login;
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
 public function handleRegister(Request $request, Response $response)
 {
  $user = new User();
  $user->loadData($request->all());

  if ($user->validate() && $user->save()) {
   $response->redirect('/')->with('success', 'Registration successful');
  }
  $this->setLayout('auth');
  return $this->render('auth/register', ['model' => $user]);
 }

 /**
  * Undocumented function
  *
  * @return void
  */
 public function loginForm()
 {
  $login = new Login;
  return $this->render('auth/login', ["model" => $login]);
 }

 /**
  * Undocumented function
  *
  * @param Request $request
  * @param Response $response
  * @return void
  */
 public function handleLogin(Request $request, Response $response)
 {
  $loginForm = new Login;
  $loginForm->loadData($request->all());
  if ($loginForm->validate() && $loginForm->login()) {

   $response->redirect('/')->with('success', 'Login successful');
  }
  return $this->render('auth/login', ["model" => $loginForm]);
 }
 /**
  * Undocumented function
  *
  * @param Request $request
  * @param Response $response
  * @return void
  */
 public function handleLogout(Request $request, Response $response)
 {
  $loginForm = new Login;
  if ($user = Application::$app->user) {
   Application::$app->logout($user);
   $response->redirect('/')->with('success', 'Logout successful');
  }
  return $this->render('auth/login', ["model" => $loginForm]);
 }
}