<?php  
require_once("model.php");
class login_signup extends model{

    //hàm đăng kí người dùng
    function dang_ki_nguoi_dung($taikhoan,$matkhau,$email){
        $query = "INSERT INTO taikhoannguoidung (taikhoan, matkhau, email, sodu, maquyen,ngaytao) VALUES ('".$taikhoan."', '".md5($matkhau)."', '".$email."', '0', '1', NOW())";
        $result = $this->conn->query($query);
        if($result == TRUE)
        {
            return 1;
        }else{
            return 0;
        }
    }

    //hàm đăng nhập người dùng
    function dang_nhap_nguoi_dung($taikhoan,$matkhau,$check_remember){
        $query = "select * from taikhoannguoidung where taikhoannguoidung.taikhoan = '".$taikhoan."' and taikhoannguoidung.matkhau = '".md5($matkhau)."'";
        $result = $this->conn->query($query);
        $row = $result->num_rows;
        if($row == 1)
        {
            session_start();
            while ($row = $result->fetch_assoc()) {
                $_SESSION['sodu'] = $row['sodu'] ;
                $_SESSION['email'] = $row['email'];
                $_SESSION['ngaytao'] = $row['ngaytao'];
                $_SESSION['maquyen'] = $row['maquyen'];
            }
            $_SESSION['username'] = $taikhoan;
            $_SESSION['password'] = $matkhau;
            if($check_remember == "true")
            {
                setcookie("username",$taikhoan,time()+(86400*1),"/");
                setcookie("password",$matkhau,time()+(86400*1),"/");
            }
            return 1;
        }else{
            return 0;
        }
    }

    //hàm kiểm tra tồn tại của email đăng kí
    function kiemTraTonTaiEmail($email){
        $query = "select * from taikhoannguoidung where taikhoannguoidung.email = '$email'";
        $result = $this->conn->query($query);
        $row = $result->num_rows;
        return $row;
    }

    //hàm kiểm tra tồn tại của tài khoản đăng kí
    function kiem_tra_ton_tai($taikhoan,$matkhau){
        $query = "select * from taikhoannguoidung where taikhoannguoidung.taikhoan = '".$taikhoan."' and taikhoannguoidung.matkhau = '".$matkhau."'";
        $result = $this->conn->query($query);
        $row = $result->num_rows;
        return $row;
    }

}
?>