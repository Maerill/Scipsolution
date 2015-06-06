<!-- Login Formular -->
<!-- <div class="login-picture">
  <img class="" src="pics/defaultProfilePic.png" width="150">
</div> -->
<form method="post" name="login_form" class="login-form">
  <span><?php echo $error; if(isset($_SESSION['regok'])){echo $_SESSION['regok'];} $_SESSION['regok'] = '';?></span>
  <div class="login-heigth">
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" "id="login_username" placeholder="Enter your username">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" id="login_password" placeholder="Enter your password">
      </div>
    </div>
  </div>
  <div class="login-loginbutton">
    <button name="submit_login" type="submit" class="btn btn-primary btn-lg">Let's go!</button>
  </div>
</form>