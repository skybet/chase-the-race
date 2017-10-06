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

$is = (int) $user->id;

$stmt->execute([
    'userid'  => $is
    ]);
$res = $stmt->fetchAll();

echo $res[0]['user_id'];
echo $res[0]['prediction'];
echo $res[0]['fastest_pit_stop'];
echo $res[0]['first_retiree'];
echo $res[0]['safety_car'];
echo $res[0]['tiebreaker'];

}
DrawDriver();
?>