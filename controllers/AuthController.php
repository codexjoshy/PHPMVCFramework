<?php

namespace app\controllers;

use app\core\base\BaseController;
use app\core\Request;
use app\models\Register;

class AuthController extends BaseController
{
 public function register(Request $request)
 {
  $register = new Register();
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
  $register = new Register();
  $register->loadData($request->all());
  if ($register->validate() && $register->save()) {
   return 'Success';
  }
  $this->setLayout('auth');
  return $this->render('auth/register', ['model' => $register]);
 }
}