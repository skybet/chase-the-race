<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width,initial-scale=1.0">
    <title>Chase the Race</title>
    <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css"/>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107454217-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag('js', new Date());

      gtag('config', 'UA-107454217-1');
    </script>
    </head>

<?php
include_once(__DIR__.'/Includes/navBar.inc.php');
      
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


echo "<table>";
echo "<tr>";
echo "<th>Driver Winner</th>";
echo "<th>Fastest Lap</th>";
echo "<th>First Retiree</th>";
echo "<th>Safety Car?</th>";
echo "<th>Tie Breaker Amount</th>";
echo "</tr>";
echo     "<tr>";
echo         "<td>" . $res[0]['DriverWin'] ."</td>";
echo         "<td>" . $res[0]['FastestP'] . "</td>";
echo         "<td>" . $res[0]['FirstR'] . "</td>";
echo         "<td>" . $res[0]['safety_car'] . "</td>";
echo         "<td>" . $res[0]['tiebreaker'] . "</td>";
echo     "</tr>";
echo "</table>";

}
DrawDriver();
?>
</html>