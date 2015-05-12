<!-- Login Formular -->
<div class="center_picture">
  <img class="" src="pics/defaultProfilePic.png" width="200">
</div>
<div class="center_2">
  <form action="index.php" method="post" name="login_form" class="form-horizontal">
    <div class="control-group">
      <label for="inputEmail3" class="col-sm-5 control-label">Username:</label>
      <div class="col-sm-2">
        <input type="username" id="inputUsername" name="login_username" placeholder="Username" required>
      </div>
    </div>
    <div class="control-group">
      <label for="inputPassword3" class="col-sm-7 control-label">Password:</label>
      <div class="col-sm-2">
        <input type="password" id="inputPassword" name="login_password" placeholder="Password" required>
      </div>
    </div>
    <div class="control-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Sign in</button>
      </div>
    </div>
  </form>
</div>