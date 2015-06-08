<?php
    require_once("classes/database.php");
    require_once("classes/picLoader.php");

    $dbClass = new Database();
    $picLoaderClass = new picLoader($dbClass);

    $username = $_SESSION['user_name'];

    $sql = "SELECT id FROM tbl_Users WHERE username=?";

    $user = $dbClass->query_execute($sql, [$username]);
    $profilePic = $picLoaderClass->getProfilePicByUser($user->id);
    //$allPics = $picLoaderClass->getAllPicsOffUser(1);
    //echo "<pre>";
    //print_r($_SERVER);die;
    //echo "</pre>";
?>

<div class="row profil-wrapper">
	<div class="profil-profilpic">
		<img src="<?php if($profilePic!==null){echo $profilePic;}else{echo "pics/defaultProfilePic.png";} ?>" width="200">
	</div>
	<div class="profil-userinfo">
		<div class="profil-label">
			<label for="username" class="control-label">Username:</label>
		    <label for="email" class="control-label">Email:</label>
		    <label for="gender" class="control-label">Gender:</label>
		    <label for="phonenumber" class="control-label">Phonenumber:</label>
		    <label for="birthday" class="control-label">Birthday:</label>
	  	</div>
		<div class="profil-inputs">
		  <form class="form-group" id="userinfo" action="functions/updateProfil.php" method="post">
		    <input type="text" class="form-control input-sm" />
		    <input type="email" class="form-control input-sm" />
		    <div class="profil-radio">
		      <label class="radio-inline">
		        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male" /> Male
		      </label>
		      <label class="radio-inline">
		        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female" /> Female
		      </label>
		    </div>
		    <input type="tel" class="form-control input-sm" />
		    <input type="date" class="form-control input-sm" />
            <input type="submit" class="hidden" id="submit-userInfo"/>
		  </form>
		</div>
	</div>
	<div class="profil-mostLiked">
		<?php // load most liked pic ?>
  		<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
	</div>
</div>
<div class="row">
	<div class="profil-uploaddiv">
		<div class="profil-uploadbtn">
            <form class="form-group" action="functions/uploadProfilePic.php" method="post" enctype='multipart/form-data'>
                <input type="file" name="profilpic" id="profilpic">
                <button type="submit" name="submit" class="btn btn-primary">Upload Profilepic</button>
            </form>
		</div>
	</div>
	<div class="profil-savediv">
		<div class="profil-savebtn">
			<button type="submit" name="submit" class="btn btn-primary" for="submit-userInfo">Save Profil</button>
		</div>
	</div>
	<div class="profil-uploadpicdiv">
		<div class="profil-uploadpicbtn">
                <input type="file" name="pics" id="pics">
                <button type="submit" name="submit" class="btn btn-primary">Upload Pic</button>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="profil-heading">
			<h1>Your Pics</h1>
		</div>
		<div class="profil-piccollegtion">
			<div class="profil-inlineblock">
				<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
			</div>
			<div class="profil-inlineblock">
				<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
			</div>
			<div class="profil-inlineblock">
				<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
			</div>
			<div class="profil-inlineblock">
				<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
			</div>
			<div class="profil-inlineblock">
				<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
			</div>
		</div>
	</div>
</div>