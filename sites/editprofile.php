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
    $userInfo = $dbClass->query_execute($sqlUserInfo, [$user->id]);

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
    <a href="?site=profile" class="btn btn-primary btn-sm right" role="button">Back to profile</a>
</div>
<div class="row profile-wrapper">
    <div class="profile-profilepic">
        <img src="<?php if($profilePic!==null){echo $profilePic;}else{echo "pics/defaultProfilePic.png";} ?>" width="200">
    </div>
    <div class="profile-userinfo">
        <div class="profile-label">
            <label for="username" class="control-label">Username:</label>
            <label for="mail" class="control-label">Email:</label>
            <label for="gender" class="control-label">Gender:</label>
            <label for="phonenumber" class="control-label">Phonenumber:</label>
            <label for="birthday" class="control-label">Birthday:</label>
        </div>
        <div class="profile-inputs">
            <form class="form-group" action="functions/uploadprofile.php" method="post">
                <input type="text" name="username" class="form-control input-sm" value="<?php echo $userInfo->username ?>" />
                <input type="email" name="mail" class="form-control input-sm" value="<?php echo $userInfo->mail ?>" />
                <div class="profile-radio">
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
    <div class="profile-mostLiked">
        <img class="" src="http://preprod.picture-organic-clothing.com/wp-content/uploads/2015/03/4-encore.png" width="200">
    </div>
</div>
<div class="row">
    <div class="profile-uploaddiv">
        <div class="profile-uploadbtn">
            <form class="form-group" action="functions/uploadProfilePic.php" method="post" enctype='multipart/form-data'>
                <input type="file" name="profilepic" id="profileFile" />
                <button type="submit" name="submitProfilePic" class="btn btn-primary" id="profilePic" disabled>Upload Profilepic</button>
            </form>
        </div>
    </div>
    <div class="profile-savediv">
        <div class="profile-savebtn">
            <label class="btn btn-primary" for="submit-userInfo">Save Profile</label>
        </div>
    </div>
    <div class="profile-uploadpicdiv">
        <div class="profile-uploadpicbtn">
            <form class="form-group" action="functions/uploadPic.php" method="post" enctype="multipart/form-data">
                <input type="file" name="pic" id="uploadFile" />
                <button type="submit" name="submitPic" class="btn btn-primary" id="uploadPic" disabled>Upload Pic</button>
            </form>
        </div>
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
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(function(){
        $('#uploadFile').click(function () {
            $('#uploadPic').removeAttr("disabled");
        });

        $('#profileFile').click(function () {
            $('#profilePic').removeAttr("disabled");
        });
    })
</script>