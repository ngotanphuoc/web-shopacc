<?php
include('model.php');
class quanlidanhmuc extends model{
    var $table = "danhmucgame";
    var $content = "id_danhmuc";

    //lấy danh sách loại tài khoản
    function list_loai_tai_khoan(){
        $query = "select * from loaitaikhoan";
        include('result.php');
        return $data;
    }
}   
?>