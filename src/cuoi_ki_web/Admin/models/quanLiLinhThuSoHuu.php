<?php
include('model.php');
class quanLiLinhThuSoHuu extends model{
    var $table = "linhthusohuu";
    var $content = "id_tai_khoan";
    var $content1 = "id_sohuu";

    function listLinhThuById($id){
        $query = "select * from linhthu where linhthu.id = '$id'";
        include('result.php');
        return $data;
    }

    // lấy danh sách linh thú mà tài khoản game chưa có
    function listLinhThuByIdNotHave($id){
        $query = "SELECT * from linhthu where linhthu.id NOT IN (select linhthusohuu.id from linhthusohuu where linhthusohuu.id_tai_khoan = '$id')";
        include('result.php');
        return $data;
    }
}   
?>