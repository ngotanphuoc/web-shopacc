<?php
require_once("model.php");
class quanlitaikhoan extends model{
    //đổi mật khẩu
    function doi_mat_khau($matkhau,$taikhoan){
        $query = "update taikhoannguoidung set taikhoannguoidung.matkhau = '".md5($matkhau)."' where taikhoannguoidung.taikhoan = '".$taikhoan."'";
        $result = $this->conn->query($query);
        if($result == TRUE)
        {
            session_destroy();
            return 1;
        }else{
            return 0;
        }
    }

    //kiểm tra mật khẩu có đúng hay không
    function kiem_tra_mat_khau($taikhoan,$matkhau){
        $query = "select * from taikhoannguoidung where taikhoannguoidung.taikhoan = '".$taikhoan."' and taikhoannguoidung.matkhau = '".md5($matkhau)."'";
        $result = $this->conn->query($query);
        $row = $result->num_rows;
        return $row;
    }

    //in ra thông tin tài khoãn đã giao dịch
    function lay_data_tk_da_mua($idnguoidung){
        $query = "select taikhoangame.taikhoan, taikhoangame.matkhau, thongtintaikhoandaban.gia,thongtintaikhoandaban.ngaymua,thongtintaikhoandaban.id_tai_khoan, khuyenmai.ten from (thongtintaikhoandaban join taikhoangame on thongtintaikhoandaban.id_tai_khoan = taikhoangame.id_tai_khoan) join khuyenmai on khuyenmai.id_km  = thongtintaikhoandaban.id_km  where thongtintaikhoandaban.taikhoan = '".$idnguoidung."'";
        include('result.php');
        return $data;
    }
}   
?>