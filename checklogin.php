<?php
session_start();
include 'dbconn.php';
$token = false;
$username = "hemantk";
$password = "m$0h@ppy";
if (isset($_POST['login']) && !empty($_POST['username'] && !empty($_POST['password']))) {
	$token = true;
	$username = $_POST['username'];
	$password = $_POST['password'];
	// echo $username;
	// echo $password;
	$username = stripslashes($username);
	$password = stripslashes($password);
	//echo $username;
	//echo $password;
}

//$token = true;
if ($token) {
	if (!$conn) {
		die("could not connect:". mysql_error());
	}
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	// echo $username;
	// echo $password;
	//echo $sql;
	$sql = "SELECT username FROM users WHERE username = '{$username}' && password = PASSWORD('{$password}')";
	$retval = mysql_query($sql,$conn);
	$rows = mysql_num_rows($retval);
	if($rows == 1){
		$_SESSION['login_user'] = sprintf("'%s'",$username);
		//echo $_SESSION['login_user'];
		header("location:entry.php");
	}	else{
		$error = "Username or password is invalid";
		header("location:index.php");
		//echo $error;
	}
	// if(!$retval){
	// 	die('could not get data:'.mysql_error());
	// }
	// while ($row = mysql_fetch_assoc($retval)) {
	// 	echo $row['user_name'];
	// }
	//echo "connected succesfully";
	mysql_close($conn);
}

?>
