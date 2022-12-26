<?php

namespace app\core\base;

use app\core\Application;

abstract class BaseModel
{
 public const RULE_REQUIRED = 'required';
 public const RULE_EMAIL = 'email';
 public const RULE_MIN = 'min';
 public const RULE_MAX = 'max';
 public const RULE_MATCH = 'match';


 public function loadData($data)
 {
  foreach ($data as $key => $value) {
   if (property_exists($this, $key)) {
    $this->{$key} = $value;
   }
  }
 }

 abstract public function rules(): array;

 public array $errors = [];

 public function addError(string $attribute, string $rule, array $params = [])
 {
  $message = $this->errorMessages()[$rule] ?? '';
  if ($params) {
   foreach ($params as $key => $value) {
    $message = str_replace("{{$key}}", $value, $message);
   }
  }
  $this->errors[$attribute][] = $message;
 }

 public function errorMessages()
 {
  return [
   self::RULE_REQUIRED => 'This field is required',
   self::RULE_EMAIL => 'This field must be a valid email address',
   self::RULE_MIN => 'Min length of this field is {min}',
   self::RULE_MAX => 'Max length of this field is {max}',
   self::RULE_MATCH => 'This field must be same as {match}'
  ];
 }
 public function validate()
 {

  foreach ($this->rules() as $attribute => $rules) {
   $value = $this->{$attribute};
   foreach ($rules as $rule) {
    $ruleName = $rule;
    if (is_array($ruleName)) $ruleName = $rule[0];
    if ($ruleName === self::RULE_REQUIRED && !$value) {
     $this->addError($attribute, self::RULE_REQUIRED);
    }
    if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_SANITIZE_EMAIL)) {
     $this->addError($attribute, self::RULE_REQUIRED);
    }
    if ($ruleName === self::RULE_MIN && $value < $rule[self::RULE_MIN]) {
     $this->addError($attribute, self::RULE_MIN, $rule);
    }
    if ($ruleName === self::RULE_MAX && $value > $rule[self::RULE_MAX]) {
     $this->addError($attribute, self::RULE_MAX, $rule);
    }
    if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule[self::RULE_MATCH]}) {
     $this->addError($attribute, self::RULE_MATCH, $rule);
    }
   }
  }
 }

 public function hasError($attribute)
 {
  return $this->errors[$attribute] ?? false;
 }
 public function getFirstError($attribute)
 {
  if ($this->hasError($attribute)) return $this->errors[$attribute][0];
  return false;
 }
}