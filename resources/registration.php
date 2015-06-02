<?php

//Session start
session_start();

require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../classes/database.php');
require_once(__DIR__.'/../db/user.php');

//Header setzen
header("Content-Type: text/html; charset=utf-8");

//Wenn kein Session Variable Login gesetzt wurde, dann wird 0 gesetzt
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = 0;
}
/* Benuterauthentifizierung */
if(isset($_POST['username'])){
		//Wenn Auth in Ordnung, dann wird die Session Variable auf 1 gesetzt und die UID wird dazugespeichert
		if (check_User() == true){
			$_SESSION['login'] = 1;
			header('Location: sites/register.php');
		} else {
			$_SESSION['login'] = 0;	
			header("Location: registration.php?p=register&login=fail");
		}
}


if (isset($_GET['p'])){
	//Regristrierungsseite
	if ($_GET['p'] == "register"){
		//Prüfen, ob der User schon existiert
		$search_user= "SELECT * FROM tbl_users WHERE username='".mysql_real_escape_string($_POST['username'])."'";
		$result = query_execute($search_user);
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