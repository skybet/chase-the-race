<?php
function getDB(){
  static $pdo;
  if (isset($pdo)){
      return $pdo;
  }

  $host = '127.0.0.1';
  $db   = 'chase the race';
  // $user = 'user';
  // $pass = 'password';
  //
  // $dsn = "mysql:host=$host;dbname=$db";
  // $pdo = new PDO($dsn, $user, $pass);
  //
  // return $pdo;
}
?>
