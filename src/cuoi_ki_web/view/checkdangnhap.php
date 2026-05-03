<?php
include('../model/login_signup.php');
	$username = $_GET["username"];
	$password = $_GET["password"];
	$remember = $_GET["remember"];
	

	$obj = new login_signup();
	
	echo $obj->dang_nhap_nguoi_dung($username,$password,$remember);

	exit();
?>