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
          <strong>Benutzername schon vergeben!</strong> Wählen Sie einen anderes aus ;-)
        </div>';
    }
  }
  ?>
<div class="login-picture">
  <img class="" src="pics/defaultProfilePic.png" width="200">
</div>
<div class="login-form">
  <div class="login-heigth">
    <div class="form-group">
      <label for="username" class="col-sm-3 control-label">Username:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="username" placeholder="Enter your username">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Password:</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="Confirm password" class="col-sm-3 control-label">Confirm password:</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm your password">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="Gender" class="col-sm-3 control-label">Gender:</label>
      <div class="col-sm-9">
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male" checked>Male</label>
      <label class="radio-inline">
          <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">Female</label>
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="E-Mail" class="col-sm-3 control-label">E-Mail:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="e-mail" placeholder="Enter your e-mail">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="Birthday" class="col-sm-3 control-label">Birthday:</label>
      <div class="col-sm-9">
        <input type="date" class="form-control" id="birthday" placeholder="Enter your birthday">
      </div>
    </div>
  </div>
  <div class="login-heigth">
    <div class="form-group">
      <label for="Phone number" class="col-sm-3 control-label">Phone number:</label>
      <div class="col-sm-9">
        <input type="tel" class="form-control" id="password" placeholder="Enter your phone number">
      </div>
    </div>
  </div>
  <div class="login-loginbutton">
    <button type="submit" class="btn btn-primary btn-lg">Register!</button>
  </div>
  
  
</div>