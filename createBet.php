<?php
include 'classes/usermanager.php';
include 'logic/db.php';

//print_r($_POST); //test for POST

echo $_POST['email'];
$usermanager = new UserManager(getDB());
$usermanager->insertUser($_POST['email']);
//$user = $usermanager->byEmail($email);

echo $_POST['prediction'];
echo $_POST['tiebreaker'];


?>
