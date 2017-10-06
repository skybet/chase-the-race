<?php

include("db.php");
include("../classes/predictionmanager.php");

function drawWinner(){
    $pm = new PredictionManager(getDB());
    $list = $pm->getWinnerList($_POST);
    if (count($list) == 0){
        echo "Nobody won... this time!";
    } else {
        echo "<br> <br>";
        foreach ($list as $key => $row){
            $list[$key]['tiebreaker'] = abs($_POST['tiebreaker'] - $row['tiebreaker']);
            $tiebreakerOrdered[$key] = abs($_POST['tiebreaker'] - $row['tiebreaker']);
            $emailOrdered[$key] = $row['email'];
        }
        array_multisort($tiebreakerOrdered, SORT_ASC, $emailOrdered, SORT_ASC, $list);

        echo "<table>
                <tr>
                    <th>Email</th>
                    <th>Tiebreaker Difference</th>
                    <th>Domain Count</th>
                    <th>IP Count</th>
                </tr>";
        foreach($list as $key => $user){
            $domainCount = $pm->getDomainCount($user['domain']);
            $ipCount = $pm->getIPCount($user['ip']);
            echo "<br>";
            echo "<tr>
                    <td>".$user['email']."</td>
                    <td>".$user['tiebreaker']."</td>
                    <td>".$domainCount["COUNT(domain)"]."</td>
                    <td>".$ipCount["COUNT(ip)"]."</td>
                  </tr>";
        }
        echo "</table>";
    }
}


drawWinner();


?>
