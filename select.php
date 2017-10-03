<?php
include 'logic/db.php';

function testquery($db){
    $query = "Select * from Users";
    echo $query;
}

?>