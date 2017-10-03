<?php
// function getDB(){
//   static $pdo;
//   if (isset($pdo)){
//       return $pdo;      
//   }
$host = 'us-cdbr-iron-east-05.cleardb.net';
$db   = 'heroku_2a00e25f9fd5fde';
$user = 'b853c9a50b3dae';
$pass = '850596d0';

$mysqli = new mysqli($host, $user, $pass, $db);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

  if ($result = $mysqli->query("SELECT * FROM Users")) {
    printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
    $result->close();
}

  // $dsn = "mysql:host=$host;dbname=$db";
  // $pdo = new PDO($dsn, $user, $pass);

  // return $pdo;
// }
?>
