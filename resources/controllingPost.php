<?php

require_once(__DIR__.'/../db/user.php');

/* Benuterauthentifizierung */
if(!empty($_POST['username']) && !empty($_POST['password'])){

	if(isset($_POST['username']) AND is_string($_POST['username'])) {
		$username = trim($_POST['username']);
	} else {
		echo "username KONNTE NICHT AUSGEFÜHRT WERDEN";
	}

	if(isset($_POST['password']) AND is_string($_POST['password'])) {
		$password = trim($_POST['password']);
	} else {
		echo "password KONNTE NICHT AUSGEFÜHRT WERDEN";
	}

	if(isset($_POST['email']) AND is_string($_POST['email'])) {
		$email = trim($_POST['email']);
	} else {
		echo "email KONNTE NICHT AUSGEFÜHRT WERDEN";
	}

	if(isset($_POST['gender']) AND ($_POST['gender'] === '1' || $_POST['gender'] === '2')) {
		$gender = trim($_POST['gender']);
	} else {
		echo "gender KONNTE NICHT AUSGEFÜHRT WERDEN";
	}
	
	if(isset($_POST['birthday'])){
		$date = new DateTime($_POST['birthday']);
		$birthday = trim($_POST['birthday']);
	} else {
		echo "birthday KONNTE NICHT AUSGEFÜHRT WERDEN";
	}

	if(isset($_POST['phonenumber'])){
		$phonenumber = trim($_POST['phonenumber']);
	} else {
		echo "phonenumber KONNTE NICHT AUSGEFÜHRT WERDEN";
	}

	//User erstellen
	var_dump(insert_user([
		'username' => $username,
		'password' => $password,
		'mail' => $email,
		'gender' => $gender,
		'birthday' => $birthday,
		'phonenumber' => $phonenumber,
		]));
} else {
	echo '<span class="help-inline">Bitte füllen Sie alle Felder aus!</span>';
}