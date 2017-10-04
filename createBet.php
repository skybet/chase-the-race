<?php
include 'classes/usermanager.php';
include 'classes/predictionmanager.php';
include 'classes/user.php';
include 'classes/prediction.php';
include 'logic/db.php';

//print_r($_POST); //test for POST

//echo $_POST['email'];
$usermanager = new UserManager(getDB());
$exists = $usermanager->doesEmailExist($_POST['email']);

if (!$exists) {

$usermanager->insertUser($_POST['email']);

$user = $usermanager->byEmail($_POST['email']);

$predictionmanager = new PredictionManager(getDB());
//var_dump($user->id);

$predictionmanager->save($user->id, $_POST);
header('Location: confirmation.php');
}
else header('Location: error.php');
?>
