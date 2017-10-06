<?php
// log out logic
include('sessions.php');
//logout code

// match PHPSESSID settings
setcookie('PHPSESSID', '', time()-3600);
// clear the Session cookie
$_SESSION = array();
// empty the array
session_destroy();
//destroy the session
header("location:../index.php");
//to redirect
exit();
?>
