<?php


use codexjoshy\sleekmvc\Application;

class m0002_add_phone_column_to_users
{
 public function up()
 {
  echo "Applying migrations 🙂 " . PHP_EOL;
  $db = Application::$app->db;
  $SQL = "ALTER TABLE users ADD COLUMN phone VARCHAR(255) NOT NULL AFTER `name`";
  $db->pdo->exec($SQL);
 }
 public function down()
 {
  echo "Dropping Table " . PHP_EOL;
  $db = Application::$app->db;
  $db->pdo->exec("ALTER TABLE users DROP COLUMN `password`;");
  echo "Table dropped successfully 🚀 " . PHP_EOL;
 }
}
