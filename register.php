<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="/css/chaseTheRaceStyle.css"/>
  </head>
  <body>
      <?php include_once(__DIR__.'/Includes/navBar.inc.php'); ?>
    <div class="container">
      <form name="registerForm" action="logic/checkRegister.php" method="post">
        <label>Email</label>
        <br/>
        <input type="email" name="email" required>
        <br/>
        <label>Password</label>
        <br/>
        <input type="password" name="password" required>
        <br/>
        <label>Check Password</label>
        <br/>
        <input type="password" name="checkPassword" required>
        <br/>
        <input type="submit">
      </form>
    </div>
  </body>
</html>
