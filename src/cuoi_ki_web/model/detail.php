<?php
require_once("model.php");
class Detail extends model{
    var $table = "taikhoangame";
    var $content = "id_tai_khoan";
    
    function lay_danh_sach_tuong_theo_id($idtaikhoan){
        $query = "SELECT tuong.ten, tuong.anh FROM ((tuongsohuu join tuong on tuongsohuu.id = tuong.id) join taikhoangame ON tuongsohuu.id_tai_khoan = taikhoangame.id_tai_khoan) join danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc WHERE tuongsohuu.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game != 3 or taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game = 3 and taikhoangame.trangthai = 0";
        include('result.php');
        return $data;
    }

    function lay_danh_sach_trang_phuc_theo_id($idtaikhoan){
        $query = "SELECT trangphuc.ten, trangphuc.anh FROM ((trangphucsohuu join trangphuc on trangphucsohuu.id = trangphuc.id) join taikhoangame ON trangphucsohuu.id_tai_khoan = taikhoangame.id_tai_khoan) join danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc WHERE trangphucsohuu.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game != 3 or taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game = 3 and taikhoangame.trangthai = 0";
        include('result.php');
        return $data;
    }

    function lay_danh_sach_linh_thu_theo_id($idtaikhoan){
        $query = "SELECT linhthu.ten, linhthu.anh FROM ((linhthusohuu join linhthu on linhthusohuu.id = linhthu.id) join taikhoangame ON linhthusohuu.id_tai_khoan = taikhoangame.id_tai_khoan) join danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc WHERE linhthusohuu.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game != 3 or taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game = 3 and taikhoangame.trangthai = 0";
        include('result.php');
        return $data;
    }

    function lay_data_rank_va_gia_va_trang_thai_theo_id($idtaikhoan)
    {
        $query = "select taikhoangame.rank, taikhoangame.giahientai,taikhoangame.trangthai from taikhoangame join danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc WHERE taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game !=3 or taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game = 3 and taikhoangame.trangthai = 0";
        include('result.php');
        return $data;
    }


    function laySlTrangPhucLinhThuTrangPhuc($id){
        $query = "select * from taikhoangame where taikhoangame.id_tai_khoan = '$id'";
        include('result.php');
        return $data;
    }
    function lay_ten_va_id_danh_muc_theo_id($idtaikhoan)
    {
        $query = "select danhmucgame.id_danhmuc,danhmucgame.ten FROM danhmucgame where danhmucgame.id_danhmuc = (SELECT taikhoangame.id_danhmuc FROM taikhoangame WHERE taikhoangame.id_tai_khoan = ".$idtaikhoan.")";
        include('result.php');
        return $data;
    }

    function lay_anh_theo_id($idtaikhoan){
        $query = "SELECT taikhoangame.anh from taikhoangame join danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc WHERE taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game !=3 or taikhoangame.id_tai_khoan = ".$idtaikhoan." and danhmucgame.id_loai_game = 3 and taikhoangame.trangthai = 0";
        include('result.php');
        return $data;
    }
    function danh_sach_tai_khoan_lien_quan($iddanhmuc,$idtaikhoan){
        $query = "select * from taikhoangame where taikhoangame.id_danhmuc = ".$iddanhmuc." and taikhoangame.trangthai = 1 and taikhoangame.id_tai_khoan != ".$idtaikhoan." ORDER BY RAND () limit 4";
        include('result.php');
        return $data;
    }

    // hàm xử lí mua tài khoản game 
    function mua_tai_khoan_game($taikhoannguoidung,$idtaikhoan,$gia,$id_km){
        $query = "insert into thongtintaikhoandaban (taikhoan,id_tai_khoan,ngaymua,gia,id_km) values ('".$taikhoannguoidung."', '".$idtaikhoan."', NOW() , ".$gia.",'$id_km')";
        $result = $this->conn->query($query);
        if($result == TRUE)
        {
            return 1;
        }else{
            return 0;
        }
    }

    //lấy ảnh của tài khoản
    function layAnhTaiKhoanTheoId($id){
        $query = "SELECT * FROM anhsohuu where anhsohuu.id_tai_khoan ='$id'";
        include('result.php');
        return $data;
    }

    //thay đổi trạng thái của tài khoản game khi đã bán
    function thay_doi_trang_thai_da_mua($id_tai_khoan){
        $query = "UPDATE taikhoangame 
        SET taikhoangame.trangthai = 0 
        WHERE taikhoangame.id_tai_khoan = ".$id_tai_khoan;
        $result = $this->conn->query($query);
        if($result == TRUE)
        {
            return 1;
        }else{
            return 0;
        }
    }

    //thay đổi số dư tài khoản người dùng
    function cap_nhat_so_du_tai_khoan_nguoi_dung($taikhoannguoidung,$sodu)
    {
        $query = "UPDATE taikhoannguoidung 
        SET taikhoannguoidung.sodu = ".$sodu." 
        WHERE taikhoannguoidung.taikhoan = '".$taikhoannguoidung."'";
        $result = $this->conn->query($query);
        if($result == TRUE)
        {
            return 1;
        }else{
            return 0;
        }
    }
    
    //lấy thông tin tài khoản game
    function thong_tin_tai_khoan_game($id_tai_khoan)
    {
        $query = "select taikhoangame.taikhoan,taikhoangame.matkhau from taikhoangame where taikhoangame.id_tai_khoan = '".$id_tai_khoan."'";
        include('result.php');
        return $data;
    }
}
?>