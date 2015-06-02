<!--REGISTER FORM -->

  <?php
  //Wenn Registrierung submited, testen ob es den Benutzter schon gibt
  if (isset($_GET['login'])){
    if($_GET['login'] == "noname"){ //Name bereits vergeben
      echo '<div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Benutzername schon vergeben!</strong> Bitte wählen Sie einen anderen aus.
        </div>';
    }
  }
  ?>
<div class="login-picture">
  <img class="" src="pics/defaultProfilePic.png" width="200">
</div>
<form method="post" id="form_register" action="resources/controllingPost.php" name="form_register" class="login-form">
  <div class="register-label">
    <label for="username" class="control-label">Username:</label>
    <label for="password" class="control-label">Password:</label>
    <label for="confirmPassword" class="control-label">Confirm password:</label>
    <label for="email" class="control-label">Email:</label>
    <label for="gender" class="control-label">Gender:</label>
    <label for="phonenumber" class="control-label">Phonenumber:</label>
    <label for="birthday" class="control-label">Birthday:</label>
  </div>
  <div class="register-inputs">
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
    <div class="register-radio">
      <label class="radio-inline">
        <input type="radio" name="gender" id="male" value="1"> Male
      </label>
      <label class="radio-inline">
        <input type="radio" name="gender" id="female" value="2"> Female
      </label>
    </div>
    <input type="tel" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter your phonenumber">
    <input type="date" class="form-control" name="birthday" id="birthday">
  </div>
  <div class="register-registerbutton">
    <button type="submit" class="btn btn-primary btn-lg" onClick="validatePassword()";>Register now!</button>
  </div>
</form>

<!-- Validation Registrierungsformular -->
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
function validatePassword(){
  //console.log('### In validatePasssword');
  $("#form_register").validate(
    rules: {
      username :{required: true, maxlength: 31},                      
      password :{required: true, minlength: 5},
      confirm_password:{required: true, minlength: 5, equalTo: "#password"}   
      },
    messages: {
      username: "Benutzername darf maximal 31 Zeichen lang sein!",
      password :" Password muss mindestens 5 Zeichen lang sein!",
      confirm_password :" Bitte bestätigen Sie ihr Passwort"
      },
    
  );
  if(validator.form()){
    
  }
}
</script>