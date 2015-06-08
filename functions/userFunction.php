<?php
require_once(__DIR__.'/../classes/database.php'); //MySQL
require_once(__DIR__.'/../db/user.php'); //MySQL
$error=''; //ERRORvariable

//Login
if (isset($_POST['submit_login'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is empty";
	}
	else {
		$username=$_POST['username'];
		$password=$_POST['password'];
		#$username = stripslashes($username);
		#$password = stripslashes($password);
		#$username = mysql_real_escape_string($username);
		#$password = mysql_real_escape_string($password);

		$query = Database::query("select * from tbl_users where password=? AND username=?", [
			$password,
			$username
		]);
		if (!$query) {
	    	$error = "Username or Password is invalid. Code: 119";
		}
		else if (is_object($query)) {
			$_SESSION['user_name']=$username; 
			header("location: ?site=overview"); 
		}
		else {
		$error = "Username or Password is invalid. Code: 219";
		}
	}
}


//Register
if (isset($_POST['submit_register'])) {
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['phonenumber']) || empty($_POST['birthday'])) {
		$error = "Please fill all the gabs.";
	}

	if(count($_POST['username']) < 3) {
		$error = "Username is too short.";
	}

	if(isset($_POST['birthday'])) {
		$date = new DateTime($_POST['birthday']);
		$birthday = $date->format('Y-m-d');
	}

	if($_POST['password'] !== $_POST['confirmpassword']) {
		$error = "Passwords doesn't match. Try again.";
	}

	else {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$phonenumber=$_POST['phonenumber'];

		$query = Database::query("select username, mail from tbl_users where username=? OR mail=?", [
			$username,
			$email
		]);

		if (!$query){
			var_dump(insert_user([
				'username' => $username,
				'password' => $password,
				'mail' => $email,
				'gender' => $gender,
				'birthday' => $birthday,
				'phonenumber' => $phonenumber,
			]));
			$_SESSION['regok'] = 'Registration Successful. Please log in.';
			header("location: ?site=login"); 
		}
		else if (is_object($query)){
			$error = "Username or Email already exist. Haha, funny...";
		}
		else {
			$error = "Something went wrong. What are you doing?";
		}
	}
}
?>