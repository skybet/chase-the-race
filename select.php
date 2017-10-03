<?php
include 'logic/db.php';

function testquery($db){
    $query = "Select * from Users";
    foreach ($conn->query($sql) as $row) {
        echo $row;
}
}
?>