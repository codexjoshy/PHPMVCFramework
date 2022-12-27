<?php


use app\core\Application;

class m0001_initial
{
 public function up()
 {
  echo "Applying migrations 🙂 " . PHP_EOL;
  $db = Application::$app->db;
  $SQL = "CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   email VARCHAR(255) UNIQUE NOT NULL,
   name VARCHAR(255) NOT NULL,
   status TINYINT NOT NULL DEFAULT 0 ,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   -- updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=INNODB;";
  $db->pdo->exec($SQL);
 }
 public function down()
 {
  echo "Dropping Table " . PHP_EOL;
  $db = Application::$app->db;
  $db->pdo->exec("DROP TABLE users;");
  echo "Table dropped successfully 🚀 " . PHP_EOL;
 }
}