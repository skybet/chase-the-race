<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width,initial-scale=1.0">
    <title>Chase the Race</title>
    <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css"/>
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../scripts/formValidation.js"></script>

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107454217-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag('js', new Date());

      gtag('config', 'UA-107454217-1');
    </script>


  </head>

  <body>
    <?php
      include_once(__DIR__.'/../Includes/navBar.inc.php');
    ?>
    <div class="container">
      <h1 class="pageTitle">Chase the Race</h1>
      <?php if(isset($_SESSION['login'])){ ?>
      <form class="predictionForm" action="../createBet.php" method="post">
        <h2>Place Your Bets!</h2>
          Choose a race winner!
          <select name="winner" id="">
            <option value="1">Lewis Hamilton</option>
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

          Choose the team with the fastest Pit Stop time!
          <select name="fastestPitStop" id="fastestPitStop">
            <option value="1">Ferrari</option>
            <option value="2">Force India</option>
            <option value="3">Hass</option>
            <option value="4">McLaren</option>
            <option value="5">Mercedes</option>
            <option value="6">Redbull</option>
            <option value="7">Renault</option>
            <option value="8">Sauber</option>
            <option value="9">Toro Rosso</option>
            <option value="10">Williams</option>
          </select>
          <br>

          Who will retire first?
          <select name="retiree" id="retiree">
            <option value="1">Lewis Hamilton</option>
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

          Will a safety car be used?
          <input type="checkbox" name="safetyCar">
          <br>

          Tiebreaker - How many total pit stops will be made?
          <input name="tiebreaker" id="tiebreaker" type="number" min="0" step="1"  required >
          <br/><br/>

          <input class="submitButton" type="submit" name="submit" value="Enter" onClick="return checkForm()">
        </form>
        <p id=result></p>
        <?php
        } else {
          ?>
          <p>Please Login or register to make a prediction</p>
          <?php
        }
        ?>
  </div>
  <script type="scripts/placeBet.js"></script>
  <?php
  include_once(__DIR__.'/../Includes/footer.inc.php');
  ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
