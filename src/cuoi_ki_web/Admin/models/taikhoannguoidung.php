<?php
include('model.php');
class taikhoannguoidung extends model{
    var $table = "taikhoannguoidung";
    var $content = "taikhoan";

    //mã quyền
    function maquyen(){
        $query = "select * from phanquyen";
        include('result.php');
        return $data;
    }
}
?>