<?php
include('model/model.php');
class Home extends model{

    function lay_danh_muc(){
        $query = "select * from loaitaikhoan";
        include('result.php');
        return $data;
    }

    function lay_loai_san_pham_theo_danh_muc($id_danh_muc){
        $query = "select * from danhmucgame where danhmucgame.id_loai_game = '".$id_danh_muc."'";
        include('result.php');
        return $data;
    }

    function layThongBao(){
        $query = "select thongbao from thongtinshopacc";
        include('result.php');
        return $data;
    }

    function layBanner(){
        $query = "select * from banner";
        include('result.php');
        return $data;
    }
}
?>