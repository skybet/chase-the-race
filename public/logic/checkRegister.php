<?php
include('sessions.php');
include('db.php');
include '../classes/usermanager.php';
include '../classes/user.php';

$pdo = getDB();

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

function get_client_ip_server() {
  $ipaddress = '';
  if ($_SERVER['HTTP_CLIENT_IP'])
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if($_SERVER['HTTP_X_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if($_SERVER['HTTP_X_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if($_SERVER['HTTP_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if($_SERVER['HTTP_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if($_SERVER['REMOTE_ADDR'])
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
      $ipaddress = 'UNKNOWN';

  return $ipaddress;
}

$explode = explode("@",$_POST['email']);

date_default_timezone_set('Europe/London');

$ipAddress = get_client_ip_server();
$domain = $explode[1];
$dateAndTime = date('Y-m-d H:i:s');

$usermanager = new UserManager($pdo);
$usermanager->insertUser($_POST['email'], $ipAddress, $domain, $dateAndTime, $password);

$user = $usermanager->byEmail($_POST['email']);

$_SESSION['user'] = $user;
$_SESSION['login'] = 1;

header('Location: ../index.php');

?>
