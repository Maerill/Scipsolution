<?php
    require_once(__DIR__."/../classes/database.php");
    $dbCon = new Database();
//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";
//    die;
    session_start();
    $currentUserName = $_SESSION['user_name'];
    $sqlGetUserId = "SELECT id FROM tbl_users WHERE username=?";
    $currentUser = $dbCon->query_execute($sqlGetUserId, [$currentUserName]);

    $sqlCurrentUserInfo = "SELECT username, mail, gender, birthday, phonenumber FROM tbl_users WHERE id=?";
    $userInfo = $dbCon->query_execute($sqlCurrentUserInfo, [$currentUser->id]);

//    echo "<pre>";
//    var_dump($userInfo);
//    echo "</pre>";
//    die;

    if(isset($_POST['saveProfile'])) {
        if($_POST['username']!==""){$username = $_POST['username'];}else{$username = $userInfo->username;}
        if($_POST['mail']!==""){$mail = $_POST['mail'];}else{$mail = $userInfo->mail;}
        if(isset($_POST['RadioMale'])){$gender = $_POST['RadioMale'];}else{$gender = $userInfo->gender;}
        if(isset($_POST['RadioFemale'])){$gender = $_POST['RadioFemale'];}else{$gender = $userInfo->gender;}
        if($_POST['phonenumber']!==""){$phonenumber = $_POST['phonenumber'];}else{$phonenumber = $userInfo->phonenumber;}
        if($_POST['birthday']!==""){$birthday = $_POST['birthday'];}else{$birthday = $userInfo->birthday;}
    }

    echo "<pre>";
    var_dump($birthday);
    echo "</pre>";

    $sqlUpdateUser = "UPDATE tbl_users SET username=?, mail=?, gender=?, birthday=?, phonenumber=? WHERE id=?";

    $dbCon->query_execute($sqlUpdateUser, [
        $username,
        $mail,
        $gender,
        $birthday,
        $phonenumber,
        $currentUser->id
    ]);

    $_SESSION['user_name'] = $username;

    header("Location:/?site=editprofil");