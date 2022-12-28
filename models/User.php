<?php

namespace app\models;

use app\core\UserModel;

class User extends UserModel
{
 const STATUS_INACTIVE = 0;
 const STATUS_ACTIVE = 1;
 const STATUS_DELETED = 2;


 public string $email = "";
 public string $name = "";
 public string $phone = "";
 public string $password = "";
 public string $confirmPassword = "";
 public int $status = self::STATUS_INACTIVE;

 public  function tableName(): string
 {
  return "users";
 }

 public function primaryKey(): string
 {
  return 'id';
 }

 public function attributes(): array
 {
  return ["email", "name", "phone", "password", "status"];
 }
 public function getDisplayName(): string
 {
  return $this->name ?? '';
 }
 public function save()
 {
  $this->status = self::STATUS_INACTIVE;
  $this->password = password_hash($this->password, PASSWORD_DEFAULT);
  return parent::save();
 }

 public function labels(): array
 {
  return [
   "email" => "Email Address",
   "name" => "Full Name",
   "phone" => "Phone Number",
   "confirmPassword" => "Confirm Password",
   "password" => "Password"
  ];
 }
 public function rules(): array
 {

  return [
   "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class, 'attribute' => 'email']],
   "name" => [self::RULE_REQUIRED],
   "phone" => [self::RULE_REQUIRED],
   "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 12]],
   "confirmPassword" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
  ];
 }
}