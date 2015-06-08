<?php
    require_once(__DIR__."/../classes/database.php");

    $dbCon = new Database();
	$userName = $_SESSION['user_name'];
	$sql = "select * from tbl_users where username=?";
	$query = $dbCon->query_execute($sql, $userName);



	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phonenumber = $_POST['phonenumber'];
	$query = $dbCon->query_execute("select username, mail from tbl_users where username = ? OR mail = ?", [
		$username,
		$email
	]);
	var_dump($query);
	if ($query === null){
		//die("test");
		var_dump(update_user([
			'username' => $username,
			'password' => $password,
			'mail' => $email,
			'gender' => $gender,
			'birthday' => $birthday,
			'phonenumber' => $phonenumber,
		]));
	}
?>