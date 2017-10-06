<html>   
      <head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width,initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="/css/chaseTheRaceStyle.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <?php include_once(__DIR__.'/Includes/navBar.inc.php'); ?>

  <div class="jumbotron">
      <div class="container text-center">
        <h1 class="pageTitle">Chase the Race</h1>
        <br> <h3>Register</h3>
      </div>
    </div>

    <div class="container">
  <div class="row"></div>
    <form name="registerForm" action="logic/checkRegister.php" method="post">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <label>Email</label>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <input type="email" name="email">
        </div>
        <div class="col-sm-2"></div>
      </div>

      <div class="row" style="color:rgba(0,0,0,0)">  | </div>
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <label>Password</label>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <input type="password" name="password">
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div class="row" style="color:rgba(0,0,0,0)">  | </div>
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <label>Check Password</label>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <input type="password" name="checkPassword">
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div class="row">
  
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <input class="btn btn-primary" type="submit">
        </div>
        <div class="col-sm-3"></div>
      </div>
    </form>
  </div>
</body>

</html>