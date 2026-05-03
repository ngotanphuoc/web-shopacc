<?php
include('model.php');
class quanLiTrangPhucSoHuu extends model{
    var $table = "trangphucsohuu";
    var $content = "id_tai_khoan";
    var $content1 = "id_sohuu";

    function listTrangPhucById($id){
        $query = "select * from trangphuc where trangphuc.id = '$id'";
        include('result.php');
        return $data;
    }

    // lấy danh sách tướng mà tài khoản game chưa có
    function listTrangPhucByIdNotHave($id){
        $query = "SELECT * from trangphuc where trangphuc.id NOT IN (select trangphucsohuu.id from trangphucsohuu where trangphucsohuu.id_tai_khoan = '$id')";
        include('result.php');
        return $data;
    }

}
?>