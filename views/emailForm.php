<html>

<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width,initial-scale=1.0">
  <title>Chase the Race</title>
  <link rel="stylesheet" type="text/css" href="../css/chaseTheRaceStyle.css" />
  <link rel="icon" href="../Images/favicon.ico" type="image/x-icon" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../scripts/formValidation.js"></script>

  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107454217-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments)
    };
    gtag('js', new Date());

    gtag('config', 'UA-107454217-1');
  </script>


</head>

<body>
  <?php
      include_once(__DIR__.'/../Includes/navBar.inc.php');
    ?>

    <div class="jumbotron">
      <div class="container text-center">
        <h1 class="pageTitle">Chase the Race</h1>
        <br> <h3>Japanese Grand Prix - 8th October 2017</h3>
      </div>
    </div>

    <div class="container">

      <form class="predictionForm" action="../createBet.php" method="post" onsubmit="return checkForm()">
        <div class="row">

          <div class="col-sm-5 content">
            <div class="card">
              <h5> Race Winner </h5> <br>
              <select class="form-control" name="winner" id="">
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
            </div>
          </div>

          <div class="col-sm-2">
          </div>
          <div class="col-sm-5 content">
            <div class="card">
              <h5> Fastest Pit Time </h5> <br>
              <select class="form-control" name="fastestPitStop" id="fastestPitStop">
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

            </div>
          </div>
          <br>

          <div class="col-sm-5 content">
            <div class="card">
              <h5> First Retiree </h5> <br>
              <select class="form-control" name="retiree" id="retiree">
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
            </div>
          </div>
          <div class="col-sm-2">
          </div>

          <div class="col-sm-5 content">
            <div class="cardB">
              <h5> Will a safety car be used? </h5> <br>
              <input type="checkbox" name="safetyCar">
            </div>
          </div>
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6 content">
            <div class="card">
              <h5> Tiebreaker - Number Of Pitstops </h5> <br>
              <input name="tiebreaker" id="tiebreaker" type="number" min="0" step="1" size="3" required>
            </div>
          </div>
          <div class="col-sm-3">
          </div>

        </div>


        <div class="enterCard">

      </form>
      <input class="btn btn-primary" type="submit" name="submit" value="Enter">
      </form>


      </div>


      <?php
    if(isset($_GET['notLoggedIn'])){
    echo "You must be logged in to place a prediction";
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
