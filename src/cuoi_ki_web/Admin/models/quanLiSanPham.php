<?php
include('model.php');
class quanLiSanPham extends model{
    var $table = "taikhoangame";
    var $content = "id_tai_khoan";

    //lấy tên danh muc theo id
    function layTenDanhMuctheoid($id){
        $query = "select * from danhmucgame where danhmucgame.id_danhmuc = '$id'";
        include('result.php');
        return $data;
    }

    //lấy tên danh muc
    function layTenDanhMuc(){
        $query = "select * from danhmucgame";
        include('result.php');
        return $data;
    }

    //lấy tên khuyến mãi theo id
    function layTenKhuyenMaitheoid($id){
        $query = "select * from khuyenmai where khuyenmai.id_km = '$id'";
        include('result.php');
        return $data;
    }

    //lấy tên khuyến mãi
    function layTenKhuyenMai(){
        $query = "select * from khuyenmai";
        include('result.php');
        return $data;
    }
}   
?>