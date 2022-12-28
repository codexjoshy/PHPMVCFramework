<?php

namespace app\models;

use app\core\Application;
use app\core\base\BaseModel;
use app\core\DbModel;

class Login extends BaseModel
{
 public string $email = "";
 public string $password = "";



 public function login()
 {
  $user = User::findOne(['email' => $this->email]);

  if (!$user) {
   $this->addError('email', 'User does not exist');
   return false;
  }
  if (!password_verify($this->password, $user->password)) {
   $this->addError('password', 'Password is incorrect');
   return false;
  }
  Application::$app->login($user);
  return true;
 }


 public function labels(): array
 {
  return [
   "email" => "Enter Email",
   "password" => "Enter Password"
  ];
 }
 public function rules(): array
 {
  return [
   "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
   "password" => [self::RULE_REQUIRED],
  ];
 }
}