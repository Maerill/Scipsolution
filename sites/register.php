<!--REGISTER FORM --> 
<style type="text/css">

  input:required:invalid, input:focus:invalid {
    background-image: url(pics/invalid.png);
    background-position: right top;
    background-repeat: no-repeat;
  }
  input:required:valid {
    background-image: url(pics/valid.png);
    background-position: right top;
    background-repeat: no-repeat;
  }

</style>
<form method="post" id="form_register" name="register_form" class="login-form">

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
  <span><?php echo $error; ?></span>
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
    <input type="password" class="form-control" name="confirmpassword" id="confirmPassword" placeholder="Confirm your password" required>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
    <div class="register-radio">
      <label class="radio-inline">
        <input type="radio" name="gender" id="male" value="1" required> Male
      </label>
      <label class="radio-inline">
        <input type="radio" name="gender" id="female" value="2"> Female
      </label>
    </div>
    <input type="tel" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter your phonenumber" required>
    <input type="date" class="form-control" name="birthday" id="birthday" required>
  </div>
  <div class="register-registerbutton">
    <button type="submit" name="submit_register" class="btn btn-primary btn-lg" onClick="validatePassword()";>Register now!</button>
  </div>
</form>

<!-- Validation Registrierungsformular -->
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
