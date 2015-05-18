<?php
//Nach einlogen, GET Variable login überprüfen
if (isset($_GET['login'])){
  if($_GET['login'] == "success"){ //Wenn Login erfolgreich
    echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Login successfully!</strong> Welcome to Scip!
      </div>';
  }
  if($_GET['login'] == "fail"){ //Wenn Login nicht erfolgreich
    echo '<div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Login failed!</strong> Username or Passwort incorrect!
      </div>';
  }
}
?>

<!-- Login Formular -->
<div class="home-picture">
  <img class="" src="pics/defaultProfilePic.png" width="200">
</div>
<div class="home-form">
  <div class="home-heigth">
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" placeholder="Enter your username">
      </div>
    </div>
  </div>
  <div class="home-heigth">
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
    </div>
  </div>
  <div class="home-loginbutton">
    <button type="submit" class="btn btn-primary btn-lg">Let's go!</button>
  </div>
</div>
