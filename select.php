<?php
include 'logic/db.php';

$result = mysqli_query('SELECT * FROM Users');

echo $result;
?>