<?php
include('model.php');
class quanLiTuongSoHuu extends model{
    var $table = "tuongsohuu";
    var $content = "id_tai_khoan";
    var $content1 = "id_sohuu";

    function listTuongById($id){
        $query = "select * from tuong where tuong.id = '$id'";
        include('result.php');
        return $data;
    }

    // lấy danh sách tướng mà tài khoản game chưa có
    function listTuongByIdNotHave($id){
        $query = "SELECT * from tuong where tuong.id NOT IN (select tuongsohuu.id from tuongsohuu where tuongsohuu.id_tai_khoan = '$id')";
        include('result.php');
        return $data;
    }
}   
?>