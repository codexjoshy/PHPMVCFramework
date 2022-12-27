<?php

namespace app\core;

use app\core\base\BaseModel;

abstract class DbModel extends BaseModel
{
 abstract public function tableName(): string;
 abstract public function attributes(): array;

 public function save()
 {
  try {
   $tableName = $this->tableName();
   $attributes = $this->attributes();
   $params = array_map(fn ($attr) => ":$attr", $attributes);
   $attributeList = implode(", ", $attributes);
   $paramList = implode(", ", $params);

   $statement = self::prepare("INSERT INTO $tableName ($attributeList) VALUES ($paramList)");
   foreach ($attributes as $attribute) {
    $statement->bindValue(":$attribute", $this->{$attribute});
   }
   $statement->execute();
  } catch (\Throwable $th) {
   return false;
  }

  return true;

  // Application::$app->db
 }
 public function prepare($sql)
 {
  return Application::$app->db->pdo->prepare($sql);
 }

 public function exists()
 {
 }
}