<?php
include('../model/quanlitaikhoan.php');
    session_start();
    $matkhau = $_GET['passmoi'];
    $obj = new quanlitaikhoan();
    echo $obj->doi_mat_khau($matkhau,$_SESSION['username'])
?>