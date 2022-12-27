<?php

namespace app\core\form;

use app\core\base\BaseModel;

class Field
{
 public const TYPE_TEXT = "text";
 public const TYPE_PASSWORD = "password";
 public const TYPE_NUMBER = "number";

 public string $type;
 public string $attribute;
 public BaseModel $model;

 public function __construct(BaseModel $model, string $attribute, string $type = self::TYPE_TEXT)
 {
  $this->model = $model;
  $this->attribute = $attribute;
  $this->type = $type;
 }
 public function __toString()
 {
  return sprintf(
   '<div class="form-group">
    <label>%s</label>
    <input type="%s" name="%s" value="%s"  class="form-control%s" />
    <div class="invalid-feedback">%s</div>
   </div>',
   $this->model->getLabel($this->attribute),
   $this->type,
   $this->attribute,
   $this->model->{$this->attribute},
   $this->model->hasError($this->attribute) ? ' is-invalid' : '',
   $this->model->getFirstError($this->attribute)
  );
 }

 public function passwordField()
 {
  $this->type = self::TYPE_PASSWORD;
  return $this;
 }
}