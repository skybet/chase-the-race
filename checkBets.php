<?php
include 'logic/db.php';
include 'logic/sessions.php'; 

function DrawDriver(){
$dm= new Driver(getDB());

$stmt = $this->db->prepare("select user_id, prediction, fastest_pit_stop, first_retiree, safety_car, tiebreaker
from predictions
inner join users on predictions.user_id = users.id
inner join drivers on predictions.prediction = drivers.id
where users.id = :userid");

$user = unserialize (serialize ($_SESSION['user']));

$user->email;

$r = $stmt->execute([
    'userid'  => $user->id
]);

var_dump($stmt);
}
DrawDriver();
?>