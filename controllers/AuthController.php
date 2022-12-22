<?php

namespace app\controllers;

use app\core\base\BaseController;
use app\core\Request;

class AuthController extends BaseController
{
 public function register(Request $request)
 {
  $this->setLayout('auth');
  return $this->render('auth/register');
 }
 public function handleRegister(Request $request)
 {
  $request->dd($request->all());
 }
}