<!DOCTYPE html>
<html>
<head>
<?php

//Session start
session_start();

require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../db/database.php');
require_once(__DIR__.'/../db/user.php');

//Header setzen
header("Content-Type: text/html; charset=utf-8");

//Wenn kein Session Variable Login gesetzt wurde, dann wird 0 gesetzt
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = 0;
}


/* Benuterauthentifizierung */
if(isset($_POST['login_username'])){
		//Wenn Auth in Ordnung, dann wird die Session Variable auf 1 gesetzt und die UID wird dazugespeichert
		if (checkUser($_POST['login_username'], $_POST['login_password']) == true){
			$_SESSION['login'] = 1;
			$sql = "SELECT UID FROM tb_users WHERE Username = '" . mysql_real_escape_string($_POST['login_username']) . "'";
			$temp = select_query ($sql);
			$_SESSION['UID'] = $temp[0];
			header('Location: sites/register.php');
		} else {
			$_SESSION['login'] = 0;	
			header("Location: registration.php?p=register&login=fail");
		}
}

/* Wenn der Benutzer angemeldet ist */
/* if ($_SESSION['login'] == 1){
	require_once(__DIR__'/../resources/functions.php');
	require_once(__DIR__'/../sites/navigation.php');
	//Wenn ein Bild heraufgeladen wurde
	if (isset($_FILES['bild'])){
		bild_upload($_FILES['bild']); //Funktion bild_upload wird aufgerufen -->upload.php
	}
	if (isset($_GET['p'])){
		switch ($_GET['p']){
			//Logout
			case "logout":
				session_destroy();
				header('Location: index.php');
				break;
			//Profilseite
			case "profile":
				global $uid;
				//Wenn kein UID per GET übergeben wird, dann wird die UID vom SESSION benutzt
				if (isset($_GET['uid'])) {
					$uid = $_GET['uid'];
				} else {
					$uid = $_SESSION['UID'];
				}
				require_once(__DIR__'/../sites/profil.php'); //Profilseite laden
				break;
		}
	} else {
		//Wenn keine P Get Variable gesetzt wird, dann wird das Dashboard geladen
		require_once(__DIR__'/../sites/overview.php');
	} 
} else {
//Nicht eingeloggt
	*/
if (isset($_GET['p'])){
	//Regristrierungsseite
	if ($_GET['p'] == "register"){
		//Prüfen, ob der User schon existiert
		$search_user= "SELECT * FROM tb_users WHERE Username='".mysql_real_escape_string($_POST['username'])."'";
		$result = select_query($search_user);
		if(!empty($result)){
			header('Location: register.php?p=register&login=noname'); //Wenn Benutzername schon vergeben ist, dann wird eine Fehlermeldung angezeigt
		} else {
			//Alle Felder müssen ausgefüllt sein
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				//User erstellen
				insert_user($_POST['username'],$_POST['password']);
				header('Location: registration.php?p=register&login=success');
			} else {
				echo '<span class="help-inline">Bitte füllen Sie alle Felder aus!</span>';
			}	
		}
		if (isset($_GET['login'])){
			//Login erfolgreich oder nicht
			if ($_GET['login'] == "success" ||$_GET['login'] == "fail"){
				require_once(__DIR__.'/../sites/login.php');
			} else {
				require_once(__DIR__.'/../sites/register.php');
			}
		} else {
			require_once(__DIR__.'/../sites/register.php');
		}
	}
} else {
	//Wenn gar keine Parameter, dann Login Seite
	require_once(__DIR__.'/../sites/login.php');
}

?>