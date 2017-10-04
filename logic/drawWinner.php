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
    } else {
        echo "A tiebreak has been called.<br>";
        $winner = tieBreak($list);
        if (count($winner) < 2){
            echo "The winner is: ".$winner[0]['email']."<br>";
        } else {
            echo "The winners are: <br>";
            foreach ($winner as $row){
                echo $row['email']."<br>";
            }
        }
    }
}

function tieBreak($list){
    $pitStopCount = $_POST['tiebreaker'];
    $finalWinner = [];
    foreach($list as $i => $row){
        if (!$finalWinner){
            array_push($finalWinner, $row);
        } else {
            $currentTie = $finalWinner[0]['tiebreaker'];
            $newTie = $row['tiebreaker'];
            if ((abs($newTie - $pitStopCount)) == abs($currentTie - $pitStopCount)){
                array_push($finalWinner, $row);
            } elseif (abs($newTie - $pitStopCount) < abs($currentTie - $pitStopCount)){
                unset($finalWinner);
                $finalWinner = array($row);
            }
        }
    }
    return $finalWinner;
}

echo drawWinner();


?>
