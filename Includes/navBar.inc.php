<div id="navHeader">
  <div class="container-header">
    <div style="display: inline-block;"  id="logoDiv">
    <a href=https://chase-the-race.herokuapp.com>
      <img src="/Images/logo.png" alt="logo">
    </div>
    <?php if(isset($_SESSION['login'])){ ?>
      <a style="color: white; display: inline-block; float: right;" href="../logic/logout.php">Logout</a>
    <?php } else { ?>
      <form class="loginForm" style="display: inline-block; float: right; margin-top: 10px;" action="../logic/checkLogin.php" method="post">
        <div style="display: inline-block;">
          <label>Email</label><br/>
          <input type="text" name="email"><br/>
        </div>
        <div style="display: inline-block;">
          <label>Password</label><br/>
          <input type="password" name="password"><br/>
        </div>
        <div style="display: inline-block; background: white;">
          <input type="submit">
        </div><br/>
        <?php
    if(isset($_GET['failed'])){
    echo "Login has failed!";
    }
?>
        <a style="color: white;" href="../register.php">Register</a>
      </form>
    <?php } ?>
  </div>
</div>
