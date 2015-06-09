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

    $sqlGetAllPicsOffUser = "SELECT picPath FROM tbl_pic WHERE userId=?";
    $allPicsArray = $dbClass->query_execute($sqlGetAllPicsOffUser, [$user->id]);

    function objectToArray($d) {
        if(is_object($d)) {
            $d = get_object_vars($d);
        }
        if(is_array($d)) {
            return array_map(__FUNCTION__, $d); // recursive
        } else {
            return $d;
        }
    }

    $recursiveArray = array();

    $recursiveArray = objectToArray($allPicsArray);
?>


<div class="row profile-editbutton">
	<a href="?site=editprofile" class="btn btn-primary btn-sm right" role="button">Edit profile</a>
</div>
<div class="row profile-wrapper">
	<div class="profile-profilepic">
		<img class="" src="<?php if($profilePic!==null){echo $profilePic;}else{echo "pics/defaultProfilePic.png";} ?>" width="200">
	</div>
	<div class="profile-userinfo">
		<div class="profile-label">
			<label for="username" class="control-label">Username:</label>
		    <label for="email" class="control-label">Email:</label>
		    <label for="gender" class="control-label">Gender:</label>
		    <label for="phonenumber" class="control-label">Phonenumber:</label>
		    <label for="birthday" class="control-label">Birthday:</label>
	  	</div>
		<div class="profile-inputs">
		  <fieldset disabled>
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Username"; } else { echo $query->username; } ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Mail"; } else  {echo $query->mail; } ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Gender"; } else { if($query->gender == 1){echo"Male";}else{echo"Female";}} ?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Phonenumber"; } else { echo $query->phonenumber; }?>" />
		    <input class="form-control input-sm" value="<?php if ($query === null) { echo "Can't find Birthday"; } else { echo $query->birthday; } ?>" />
		  </fieldset>
		</div>
	</div>
	<div class="profile-mostLiked">
  		<img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
	</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="profile-heading">
            <h1>Your Pics</h1>
        </div>
        <table class="table">
            <?php if(count($recursiveArray) <= 5){ ?>
                <tr class="profile-tr">
                    <?php for($x=0;$x < 5;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }else{ ?>
                            <td class="setWidth"><img src="pics/white.gif" /></td>
                        <?php }?>
                    <?php } ?>
                </tr>
            <?php }elseif(count($recursiveArray) <= 10){ ?>
                <tr class="profile-tr">
                    <?php for($x=0;$x < 5;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=5;$x < 10;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }else{ ?>
                            <td class="setWidth"><img src="pics/white.gif" /></td>
                        <?php }?>
                    <?php } ?>
                </tr>
            <?php }else{ ?>
                <tr class="profile-tr">
                    <?php for($x=0;$x < 5;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=5;$x < 10;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=10;$x < 15;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }else{ ?>
                            <td class="setWidth"><img src="pics/white.gif" /></td>
                        <?php }?>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
