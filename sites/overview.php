<?php
    require_once("classes/database.php");

    $dbClass = new Database();

    $username = $_SESSION['user_name'];

    $sql = "SELECT id FROM tbl_Users WHERE username=?";

    $user = $dbClass->query_execute($sql, [$username]);

    $sqlGetAllPicsOffUser = "SELECT picPath FROM tbl_pic";
    $allPicsArray = $dbClass->query_execute($sqlGetAllPicsOffUser, []);

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

<div class="container-fluid">
    <div class="row">
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
            <?php }elseif(count($recursiveArray) <= 15){ ?>
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
           <?php }elseif(count($recursiveArray) <= 20){ ?>
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
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=15;$x < 20;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }else{ ?>
                            <td class="setWidth"><img src="pics/white.gif" /></td>
                        <?php }?>
                    <?php } ?>
                </tr>
            <?php }elseif(count($recursiveArray) <= 25){ ?>
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
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=15;$x < 20;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=20;$x < 25;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }else{ ?>
                            <td class="setWidth"><img src="pics/white.gif" /></td>
                        <?php }?>
                    <?php } ?>
                </tr>
            <?php }elseif(count($recursiveArray) <= 30){ ?>
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
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=15;$x < 20;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=20;$x < 25;$x++){ ?>
                        <?php if($x < count($recursiveArray)){ ?>
                            <td class="setWidth"><img src="<?php echo $recursiveArray[$x]['picPath']; ?>" width="200"></td>
                        <?php }?>
                    <?php } ?>
                </tr>
                <tr class="profile-tr">
                    <?php for($x=25;$x < 30;$x++){ ?>
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