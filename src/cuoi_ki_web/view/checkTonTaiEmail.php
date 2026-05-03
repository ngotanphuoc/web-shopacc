<?php
    include('../model/login_signup.php');
	$email = $_GET["email"];
	
	$obj = new login_signup();
	
	echo $obj->kiemTraTonTaiEmail($email);

	exit();
?>