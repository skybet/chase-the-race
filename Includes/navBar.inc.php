<div id="navHeader">
  <div style="container" class="container">
    <div style="display: inline-block;"  id="logoDiv">
      <img src="/Images/logo.png" alt="logo">
    </div>
    <?php if(isset($_SESSION['login'])){ ?>
      <a style="color: white; display: inline-block; float: right;" href="../logic/logout.php">Logout</a>
    <?php } else { ?>
      <form class="loginForm" style="display: inline-block; float: right; margin-top: 20px;" action="../logic/checkLogin.php" method="post">
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
        <a style="color: white;" href="../register.php">Register</a>
      </form>
    <?php } ?>
  </div>
</div>
