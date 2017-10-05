<?php
// check login and create SESSION and count attempts
include 'db.php';
include 'sessions.php';
include '../classes/usermanager.php';
include '../classes/user.php';

$db = getDB();

//login
$r = $db->prepare(
  "select id, email, password from users where email = :email"
);
$r->execute(['email' => $_POST['email']]);

foreach ($r as $userInfo) {
  $userFactory = new UserManager($db);
  $thisUser = $userFactory->byEmail($userInfo['email']);
  if($_POST['email'] == $userInfo['email'] && $thisUser->passwordValid($_POST['password'])){
    $_SESSION['login'] = 1;
    $_SESSION['user'] = $thisUser;
    header('Location: ../index.php');        
  } else {
    print("Wrong username or password");
  }
}

?>
