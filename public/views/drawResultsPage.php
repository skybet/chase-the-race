<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css"/>
  <link rel="icon" href="../Images/favicon.ico" type="image/x-icon"/>
    <title>Draw Results</title>
</head>
<body>
  <?php include_once('../Includes/navBar.inc.php'); ?>
  <div class="container">
    <?php
        require("../logic/drawWinner.php");
    ?>
  </div>
</body>
</html>
