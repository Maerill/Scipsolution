<?php

file_put_contents('log.txt', print_r($_POST, true));
var_dump($_POST);

$password = $_POST['password'];


if (...)
	header('Location: success.php');	
else
	header('Location: failed.php');		