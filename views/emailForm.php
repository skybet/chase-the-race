<html>

  <head>
    <meta charset="utf-8">
    <title>Chase the Race</title>
    <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css"/>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body>
    
    <?php
                include_once('../includes/navBar.inc.php');
    ?>

    <h1>Chase the Race</h1>
    <form class="predictionForm" action="../createBet.php" method="post">
      <p>Please enter your email address:</p>
      <input type="email" name="email">

      <h2>Place Your Bets!</h2>

        Choose a race winner! 
        <select name="prediction" id=""> 
                <option value="1">Hamilton </option>
                <option value="2">Vettel</option>
                <option value="3">Bottas</option>
                <option value="4">Ricciardo</option>
        </select>
        <br>
        Tiebreaker - How many pit stops will be made?
        <input name="tiebreaker" type="number" min="0" step="1">

        <input type="submit" name="submit" value="submit">
      </form>

      <p id=result></p>
      <script type="scripts/placeBet.js"></script>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="scripts/emailValidation.js"></script>
</html>
