<?php
include 'logic/db.php';
include 'logic/sessions.php'; 
include 'classes/drivers.php';
include 'classes/user.php';

function DrawDriver(){
    $db = getDB();
$dm= new Driver($db);

$stmt = $db->prepare("select user_id, prediction, fastest_pit_stop, first_retiree, safety_car, tiebreaker
from predictions
inner join users on predictions.user_id = users.id
inner join drivers on predictions.prediction = drivers.id
where users.id = :userid");

$user = unserialize (serialize ($_SESSION['user']));
//$user = (user) $user;
// var_dump($user);
//var_dump();
$is = (int) $user->id;
// echo $user->id;
// var_dump($db);
echo $is;
$stmt->execute([
    'userid'  => $is
    ]);

// $thing = $r->fetchAll();
var_dump($stmt->fetchAll());
// print_r($thing);
}
DrawDriver();
?>