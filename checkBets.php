<?php
include 'logic/db.php';
include 'logic/sessions.php'; 
include 'classes/drivers.php';
include 'classes/user.php';

function DrawDriver(){
    $db = getDB();
$dm= new Driver($db);

$stmt = $db->prepare("select user_id, D1.DriverName AS DriverWin, D2.DriverName AS FastestP, D3.DriverName AS FirstR, safety_car, tiebreaker
from predictions
inner join users on predictions.user_id = users.id
inner join drivers AS D1 on predictions.prediction = D1.id
inner join drivers AS D2 on predictions.fastest_pit_stop = D2.id
inner join drivers AS D3 on predictions.first_retiree = D3.id
where users.id = :userid");

$user = unserialize (serialize ($_SESSION['user']));

$is = (int) $user->id;

$stmt->execute([
    'userid'  => $is
    ]);
$res = $stmt->fetchAll();
var_dump($res);
echo $res[0]['DriverWin'];
echo $res[0]['FastestP'];
echo $res[0]['FirstR'];
echo $res[0]['safety_car'];
echo $res[0]['tiebreaker'];

}
DrawDriver();
?>