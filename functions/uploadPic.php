<?php
    require_once(__DIR__."/../classes/database.php");

    $dbClass = new Database();

    $target_dir = "pics/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $absoluteTargetDir = __DIR__.'/../'.$target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $sqlInsertPic = "INSERT INTO tbl_pic(picPath, userId) VALUES (?, ?)";
    session_start();
    $username = $_SESSION['user_name'];
    $sqlUser = "SELECT id FROM tbl_Users WHERE username=?";
    $userId = $dbClass->query_execute($sqlUser, [$username]);

    $dbClass->query_execute($sqlInsertPic, [$target_file, $userId->id]);

    if(isset($_POST["submitPic"])){
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if($check !== false){
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
            die;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        die;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
        die;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        die;
    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $absoluteTargetDir)) {
            ;
        } else {
            echo "Sorry, there was an error uploading your file.";
            die;
        }
        header("Location:/?site=editprofile");
    }