<?php
include 'logic/db.php';
include 'logic/sessions.php'; 

function DrawDriver(){
$dm= new Driver(getDB());

$stmt = $this->db->prepare("
SELECT id, DriverName FROM drivers");

$r = $stmt->execute([
    'id'  => $uid,
    'DriverName' => $drivername
]);


// INNER JOIN Predictions
// ON users.id = predictions.user_id 
// WHERE (predictions.prediction = :winner AND 
// predictions.fastest_pit_stop = :pitstop AND 
// predictions.first_retiree = :retiree AND 
// predictions.safety_car = :safetycar)");

// $stmt->execute([
// 'winner' => $post['winner'],
// 'pitstop' => $post['fastestPitStop'],
// 'retiree' => $post['retiree'],
// 'safetycar' => $car
// ]);

var_dump($r);
}
    // $r = $db->prepare(
    //     "select id, DriverName from drivers"
    //   );
    //   $r->execute(['email' => $_POST['email']]);
      
?>