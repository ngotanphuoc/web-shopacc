<?php
include('../model/quanlitaikhoan.php');
    session_start();
    $matkhauhientai = $_GET['passhientai'];
    $obj = new quanlitaikhoan();
    echo $obj->kiem_tra_mat_khau($_SESSION['username'],$matkhauhientai);
?>