<?php

include("db.php");
include("../classes/predictionmanager.php");

function drawWinner(){
    $pm = new PredictionManager(getDB());
    $list = $pm->getWinnerList($_POST);
    if (count($list) == 0){
        echo "Nobody won... this time!";
    } elseif (count($list) < 2){
        echo "One winner... <br>";
        echo "The winner is: ".$list[0]['email']."<br>";
        return $list[0];
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
            // var_dump($pm->getDomainCount($user['domain']));
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
    


        // echo "A tiebreak has been called.<br>";
        // $winner = tieBreak($list);
        // if (count($winner) < 2){
        //     echo "The winner is: ".$winner[0]['email']."<br>";
        // } else {
        //     echo "The winners are: <br>";
        //     foreach ($winner as $row){
        //         echo $row['email']."<br>";
        //     }
        // }
    }
}

// function tieBreak($list){
//     $pitStopCount = $_POST['tiebreaker'];
//     $finalWinner = [];
//     foreach($list as $i => $row){
//         if (!$finalWinner){
//             array_push($finalWinner, $row);
//         } else {
//             $currentTie = $finalWinner[0]['tiebreaker'];
//             $newTie = $row['tiebreaker'];
//             if ((abs($newTie - $pitStopCount)) == abs($currentTie - $pitStopCount)){
//                 array_push($finalWinner, $row);
//             } elseif (abs($newTie - $pitStopCount) < abs($currentTie - $pitStopCount)){
//                 unset($finalWinner);
//                 $finalWinner = array($row);
//             }
//         }
//     }
//     return $finalWinner;
// }




drawWinner();


?>
