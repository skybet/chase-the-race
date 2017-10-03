<?php
function getDB(){
  static $pdo;
  if (isset($pdo)){
      return $pdo;
  }
  $host = 'us-cdbr-iron-east-05.cleardb.net/heroku_42070fbe6866ca9?reconnect=true';
  $db   = 'heroku_42070fbe6866ca9';
  $user = 'b1f075b4451a27';
  $pass = 'a837a4fc';

  $dsn = "mysql:host=$host;dbname=$db";
  $pdo = new PDO($dsn, $user, $pass);

  return $pdo;
}
?>
