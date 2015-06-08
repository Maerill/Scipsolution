<?php
    require_once(__DIR__."/../classes/database.php");

    $dbCon = new Database();
    session_start();
    $currentUserName = $_SESSION['user_name'];
    $sqlGetUserId = "SELECT id FROM tbl_users WHERE username=?";
    $currentUser = $dbCon->query_execute($sqlGetUserId, [$currentUserName]);

    $sqlCurrentUserInfo = "SELECT username, mail, gender, birthday, phonenumber FROM tbl_users WHERE id=?";
    $userInfo = $dbCon->query_execute($sqlCurrentUserInfo, [$currentUser->id]);

    if(isset($_POST['saveProfile'])) {
        if($_POST['username']!==""){$username = $_POST['username'];}else{$username = $userInfo->username;}
        if($_POST['mail']!==""){$mail = $_POST['mail'];}else{$mail = $userInfo->mail;}
        if(isset($_POST['RadioOption'])){$gender = $_POST['RadioOption'];}else{$gender = $userInfo->gender;}
        if(isset($_POST['RadioOption'])){$gender = $_POST['RadioOption'];}else{$gender = $userInfo->gender;}
        if($_POST['phonenumber']!==""){$phonenumber = $_POST['phonenumber'];}else{$phonenumber = $userInfo->phonenumber;}
        if($_POST['birthday']!==""){$birthday = $_POST['birthday'];}else{$birthday = $userInfo->birthday;}
    }

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