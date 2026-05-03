<?php
include('../model/login_signup.php');
	$username = $_GET["username"];
	$password = $_GET["password"];

	$obj = new login_signup();
	
	echo $obj->kiem_tra_ton_tai($username,$password);

	exit();
?>