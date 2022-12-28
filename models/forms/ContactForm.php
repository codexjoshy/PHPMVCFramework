<?php

namespace app\models\forms;

use codexjoshy\sleekmvc\base\BaseModel;

class ContactForm extends BaseModel
{
 public string $subject = "";
 public string $email = "";
 public string $body = "";
 public function rules(): array
 {
  return [
   "subject" => [self::RULE_REQUIRED],
   "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
   "body" => [self::RULE_REQUIRED]
  ];
 }
 public function labels(): array
 {
  return [
   "subject" => "Enter Subject",
   "email" => "Enter Email",
   "body" => "Enter Body"
  ];
 }

 public function send()
 {
  return true;
 }
}
