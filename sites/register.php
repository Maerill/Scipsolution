<!-- Validation Registrierungsformular -->
<script language="javascript">
$.validator.setDefaults({
    showErrors: function (errorMap, errorList) {
        this.defaultShowErrors();                            
                           
        $("." + this.settings.validClass)                    
            .tooltip("destroy");            
 
        for (var i = 0; i < errorList.length; i++) {
            var error = errorList[i];
                         
            $("#" + error.element.id)
                .tooltip({placement: "right", trigger: "focus" })
                .attr("data-original-title", error.message)                
        }
    }
});
function validatePassword(){  
  var validator = $("#form_group").validate({
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
    errorPlacement: function(error, element) {
      return false
    }                             

  });
  if(validator.form()){
    
  }
}
</script>

<!--REGISTER FORM -->

  <?php
  //Wenn Registrierung submited, testen ob es Benutzter schon gibt
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
<form class="login-form">
  <div class="register-label">
    <label for="username" class="control-label">Username:</label>
    <label for="password" class="control-label">Password:</label>
    <label for="confirmPassword" class="control-label">Confirm password:</label>
    <label for="email" class="control-label">Email:</label>
    <label for="gender" class="control-label">Gender:</label>
    <label for="phonenumber" class="control-label">Phonenumber</label>
    <label for="birthday" class="control-label">Birthday</label>
  </div>
  <div class="register-inputs">
    <input type="text" class="form-control" id="username" placeholder="Enter your username">
    <input type="password" class="form-control" id="password" placeholder="Enter your password">
    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
    <input type="email" class="form-control" id="email" placeholder="Enter your email">
    <div class="register-radio">
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
      </label>
    </div>
    <input type="phonenumber" class="form-control" id="inputPassword3" placeholder="Enter your phonenumber">
    <input type="birthday" class="form-control" id="birthday" placeholder="">
  </div>
</form>