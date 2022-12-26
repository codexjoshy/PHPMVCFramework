<?php

namespace app\models;

use app\core\base\BaseModel;

class Register extends BaseModel
{
 public string $email = "";
 public string $name = "";
 public string $phone = "";
 public string $password = "";
 public string $confirmPassword = "";

 public function rules(): array
 {

  return [
   "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
   "name" => [self::RULE_REQUIRED],
   "phone" => [self::RULE_REQUIRED],
   "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 12]],
   "confirmPassword" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
  ];
 }

 public function save()
 {
 }
}