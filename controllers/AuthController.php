<?php

namespace app\controllers;

use codexjoshy\sleekmvc\Application;
use codexjoshy\sleekmvc\base\BaseController;
use codexjoshy\sleekmvc\middlewares\AuthMiddleware;
use codexjoshy\sleekmvc\Request;
use codexjoshy\sleekmvc\Response;
use app\models\forms\Login;
use app\models\User;

class AuthController extends BaseController
{
 public function __construct()
 {
  $this->registerMiddleware(new AuthMiddleware(['profile']));
 }
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
   $response->redirect('/login')->with('success', 'Registration successful');
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

 public function profile(Request $request)
 {
  return $this->render('profile');
 }
}
