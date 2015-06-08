<?php
    require_once("classes/database.php");
    require_once("classes/picLoader.php");

    $dbClass = new Database();
    $picLoaderClass = new picLoader($dbClass);

    $username = $_SESSION['user_name'];

    $sql = "SELECT id FROM tbl_Users WHERE username=?";

    $user = $dbClass->query_execute($sql, [$username]);
    $profilePic = $picLoaderClass->getProfilePicByUser($user->id);

    $sqlUserInfo = "SELECT username, mail, gender, phonenumber, birthday FROM tbl_users WHERE id=?";
    $userInfo = $dbClass->query_execute($sqlUserInfo, [$user->id])
    //$allPics = $picLoaderClass->getAllPicsOffUser(1);
?>

<div class="row profil-wrapper">
    <div class="profil-profilpic">
        <img src="<?php if($profilePic!==null){echo $profilePic;}else{echo "pics/defaultProfilePic.png";} ?>" width="200">
    </div>
    <div class="profil-userinfo">
        <div class="profil-label">
            <label for="username" class="control-label">Username:</label>
            <label for="mail" class="control-label">Email:</label>
            <label for="gender" class="control-label">Gender:</label>
            <label for="phonenumber" class="control-label">Phonenumber:</label>
            <label for="birthday" class="control-label">Birthday:</label>
        </div>
        <div class="profil-inputs">
            <form class="form-group" action="functions/uploadProfil.php" method="post">
                <input type="text" name="username" class="form-control input-sm" value="<?php echo $userInfo->username ?>" />
                <input type="email" name="mail" class="form-control input-sm" value="<?php echo $userInfo->mail ?>" />
                <div class="profil-radio">
                    <label class="radio-inline">
                        <input type="radio" name="RadioOption" value="1" <?php if($userInfo->gender == 1){echo "checked";} ?> /> Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="RadioOption" value="2" <?php if($userInfo->gender == 2){echo "checked";} ?> /> Female
                    </label>
                </div>
                <input type="tel" name="phonenumber" class="form-control input-sm"  value="<?php echo $userInfo->phonenumber ?>" />
                <input type="date" name="birthday" class="form-control input-sm" value="<?php echo $userInfo->birthday ?>" />
                <input type="submit" name="saveProfile" class="hidden" id="submit-userInfo"/>
            </form>
        </div>
    </div>
    <div class="profil-mostLiked">
        <?php // load most liked pic ?>
        <img class="" src="pics/defaultProfilePic.png" width="200">
    </div>
</div>
<div class="row">
    <div class="profil-uploaddiv">
        <div class="profil-uploadbtn">
            <form class="form-group" action="functions/uploadProfilePic.php" method="post" enctype='multipart/form-data'>
                <input type="file" name="profilpic" />
                <button type="submit" name="submitProfilePic" class="btn btn-primary">Upload Profilepic</button>
            </form>
        </div>
    </div>
    <div class="profil-savediv">
        <div class="profil-savebtn">
            <label class="btn btn-primary" for="submit-userInfo">Save Profile</label>
        </div>
    </div>
    <div class="profil-uploadpicdiv">
        <div class="profil-uploadpicbtn">
            <form class="form-group" action="functions/uploadPic.php" method="post" enctype="multipart/form-data">
                <input type="file" name="pic" />
                <?php if(count($_FILES) == 0 OR $_FILES['pic']['name'] == '' OR $_FILES['pic']['size'] == 0){ ?>
                    <button type="submit" name="submitPic" class="btn btn-primary">Upload Pic</button>
                <?php }else{ ?>
                    <button type="submit" name="submitPic" class="btn btn-primary">Upload Pic</button>
                <?php } ?>
            </form>
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