<?php
    require_once(__DIR__."/../classes/database.php");

    $dbClass = new Database();

    $target_dir = "pics/";
    $target_file = $target_dir . basename($_FILES["profilpic"]["name"]);
    $absoluteTargetDir = __DIR__.'/../'.$target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $sql = "INSERT INTO tbl_pic (pic) VALUES (?)";
    $param = $target_file;

    $dbClass->query_execute($sql, [$param]);

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

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
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
    }
?>