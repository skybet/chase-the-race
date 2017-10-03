<?php
include 'logic/db.php';

$result = mysql_query('SELECT * FROM Users');

echo $result;
?>