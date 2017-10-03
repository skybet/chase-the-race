<html>

  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width,initial-scale=1.0">
    <title>Chase the Race</title>
    <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css"/>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../scripts/emailValidation.js"></script>
  </head>

  <body>

    <?php
                include_once(__DIR__.'/../Includes/navBar.inc.php');
    ?>
    <div class="container">
      <h1 class="pageTitle">Chase the Race</h1>
      <form class="predictionForm" action="../confirmation.php" method="post">
        <p>Please enter your email address:</p>
        <input type="email" name="email" required>

        <h2>Place Your Bets!</h2>

          Choose a race winner!
          <select name="prediction" id="">
                  <option value="1">Lewis Hamilton </option>
                  <option value="2">Sebastian Vettel</option>
                  <option value="3">Max Verstappen</option>
                  <option value="4">Daniel Ricciardo</option>
                  <option value="5">Kimi Rakikkonen</option>
                  <option value="6">Valtteri Bottas</option>
                  <option value="7">Sergio Perez</option>
                  <option value="8">Esteban Ocon</option>
                  <option value="9">Fernando Alonso</option>
                  <option value="10">Nico Hulkenburg</option>
                  <option value="11">Stoffel Vandoorne</option>
                  <option value="12">Carlos Sainz</option>
                  <option value="13">Felope Massa</option>
                  <option value="14">Jolyon Palmer</option>
                  <option value="15">Lance Stroll</option>
                  <option value="15">Pierre Gastly</option>
                  <option value="16">Romain Grosjean</option>
                  <option value="17">Kevin Magnussen</option>
                  <option value="18">Marcus Ericsson</option>
                  <option value="19">Pascal Wehrlein</option>

          </select>
          <br>
          Tiebreaker - How many pit stops will be made?
          <input name="tiebreaker" type="number" min="0" step="1"  required >
          <br/><br/>
          <input class="submitButton" type="submit" name="submit" value="Enter">
        </form>


        <p id=result></p>
  </div>
  <?php include_once(__DIR__.'/../Includes/footer.inc.php'); ?>
  <script type="scripts/placeBet.js"></script>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
