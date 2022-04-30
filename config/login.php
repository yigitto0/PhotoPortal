<?php 
require_once ("config.php");

session_start();

if(isset($_POST['login'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


$select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
$row = mysqli_fetch_array($select);

if(is_array($row)){
	$_SESSION["username"] = $row['username'];
	$_SESSION["password"] = $row['password'];

	header("Location:/PhotoPortal/stream.php");
} else{
	$_SESSION['errormsg'] = "Wrong username or password!";
	header("Location:/PhotoPortal/index.php");
}
}

?>