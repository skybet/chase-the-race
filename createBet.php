<?php
include 'classes/usermanager.php';
include 'classes/predictionmanager.php';
include 'classes/user.php';
include 'classes/prediction.php';
include 'logic/db.php';

$usermanager = new UserManager(getDB());
$exists = $usermanager->doesEmailExist($_POST['email']);

if (!$exists) {

$usermanager->insertUser($_POST['email']);

$user = $usermanager->byEmail($_POST['email']);

$predictionmanager = new PredictionManager(getDB());

$predictionmanager->save($user->id, $_POST);
header('Location: confirmation.php');
}
else
{
  echo "<script>
    alert(\"Your Email address is already in use. Please try again\");  
    window.history.back();
  </script>";

}
//header('Location: error.php');
?>
