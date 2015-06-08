<?php
    require_once(__DIR__."/../classes/database.php");

    $dbClass = new Database();

    $target_dir = "pics/";
    $target_file = $target_dir . basename($_FILES["profilpic"]["name"]);
    $absoluteTargetDir = __DIR__.'/../'.$target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $sqlInsertPic = "INSERT INTO tbl_pic(picPath, userId) VALUES (?, ?)";
    session_start();
    $username = $_SESSION['user_name'];
    $sqlGetUser = "SELECT id FROM tbl_users WHERE username=?";
    $user = $dbClass->query_execute($sqlGetUser, [$username]);

    $dbClass->query_execute($sqlInsertPic, [$target_file, $user->id]);

    $sqlGetPicId = "SELECT id FROM tbl_pic WHERE picPath=? LIMIT 1";

    $pic = $dbClass->query_execute($sqlGetPicId,[$target_file]);

    $sqlUpdateUser = "UPDATE tbl_users SET profilPicId=? WHERE id=?";

    $dbClass->query_execute($sqlUpdateUser, [$pic->id, $user->id]);

    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["profilpic"]["tmp_name"]);
        if($check !== false){
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profilpic"]["tmp_name"], $absoluteTargetDir)) {
            echo "The file ". basename( $_FILES["profilpic"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        header("Location:/?site=editprofil");
    }