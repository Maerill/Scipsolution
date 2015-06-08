<?php
require_once(__DIR__.'/../classes/database.php');
/**
 * @param array $data Array containing needed user information
 */

$dbCon = new Database();

$sqlGetUserId = "SELECT id FROM tbl_users WHERE username=?";
$username = $_SESSION['user_name'];
$user = $dbCon->query_execute($sqlGetUserId, [$username]);

function insert_user($data){
	$sql = 'INSERT INTO tbl_users(username, password, mail, gender, birthday, phonenumber) VALUES(?,?,?,?,?,?)';
	return Database::query($sql, [
		$data['username'],
		password_hash($data['password'], PASSWORD_BCRYPT),
		$data['mail'],
		$data['gender'],
		$data['birthday'],
		$data['phonenumber'],
	]);
}

function update_user($data){
	$sql = "UPDATE tbl_users SET username=?, password=?, mail=?, gender=?, birthday=?, phonenumber=? WHERE id=?";
	$dbCon->query_execute($sql, [
		$data['username'],
		password_hash($data['password'], PASSWORD_BCRYPT),
		$data['mail'],
		$data['gender'],
		$data['birthday'],
		$data['phonenumber'],
		$user->id
	]);
}

//var_dump(Database::error());
function get_user($data) {
	if(is_integer($data))
	{
		return Database::query('SELECT * FROM tbl_users WHERE id = ?', [$data]);
	}
	if(is_string($data))
	{
		return Database::query('SELECT * FROM tbl_users WHERE username = ?', [$data]);
	}
	return false;
}
function check_user($username, $password) {
	$user = get_user($username);
	if($user === false)
		return false;
	return password_verify($password, $user->password);
}