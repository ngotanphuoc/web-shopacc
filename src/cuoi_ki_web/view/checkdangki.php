<?php
include('../model/login_signup.php');
	$username = $_GET["username"];
	$password = $_GET["password"];
	$email = $_GET["email"];
	

	$obj = new login_signup();
	
	echo $obj->dang_ki_nguoi_dung($username,$password,$email);

	exit();
?>