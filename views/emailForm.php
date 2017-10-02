<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chase the Race</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  <body>
    <h1>Chase the Race</h1>
    <form class="emailForm" action="" method="post" onsubmit="validate()">
      <p>Please enter your email address:</p>
      <input id=email type="text" name="email">
      <input type="submit" name="submit" value="submit"><!-- Enter the competition</button> -->
    </form>
    <p id=result></p>
    <script type="scripts/emailValidation.js"></script>
  </body>
</html>
