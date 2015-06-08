<?php
    require_once("classes/database.php");
    require_once("classes/picLoader.php");

    $dbClass = new Database();
    $picLoaderClass = new picLoader($dbClass);

    $username = $_SESSION['user_name'];

    $sqlUser = "SELECT id FROM tbl_Users WHERE username=?";

    $user = $dbClass->query_execute($sqlUser, [$username]);
    $profilePic = $picLoaderClass->getProfilePicByUser($user->id);

    $sql = "select * from tbl_users where id=?";
    $query = $dbCon->query_execute($sql, [$user->id]);
?>


<div class="row profil-editbutton">
	<a href="?site=editprofil" class="btn btn-primary btn-sm right" role="button">Edit profil</a>
</div>
<div class="row profil-wrapper">
	<div class="profil-profilpic">
		<img class="" src="<?php if($profilePic!==null){echo $profilePic;}else{echo "pics/defaultProfilePic.png";} ?>" width="200">
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
		  <fieldset disabled>
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Username"; } else { echo $query->username; } ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Mail"; } else  {echo $query->mail; } ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Gender"; } else { if($query->gender == 1){echo"Male";}else{echo"Female";}} ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Phonenumber"; } else { echo $query->phonenumber; }?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Birthday"; } else { echo $query->birthday; } ?>" />
		  </fieldset>
		</div>
	</div>
	<div class="profil-mostLiked">
  		<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
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
