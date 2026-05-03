<?php
include('model.php');
class home_admin extends model{

    //đếm số lượng khách hàng
    function so_luong_khach_hang(){
        $query = "select count(taikhoannguoidung.taikhoan) as sl from taikhoannguoidung where taikhoannguoidung.maquyen = 1";
        include('result.php');
        foreach($data as $r){
            return $r['sl'];
        }
    }

    //doanh thu tháng hiện tại
    function doanh_thu_thang_hien_tai(){
        $date = getdate();
        $query = "SELECT SUM(thongtintaikhoandaban.gia) as tong from thongtintaikhoandaban where month(thongtintaikhoandaban.ngaymua) = ".$date['mon'];
        include('result.php');
        if($data != NULL)
        {
            foreach($data as $r){
                return number_format($r['tong']);
            }
        }else{
            return 0;
        }
    }

    //doanh thu năm hiện tại
    function doanh_thu_nam_hien_tai(){
        $query = "SELECT SUM(thongtintaikhoandaban.gia) as tong from thongtintaikhoandaban where year(thongtintaikhoandaban.ngaymua) = ".date("Y");
        include('result.php');
        if($data != NULL)
        {
            foreach($data as $r){
                return number_format($r['tong']);
            }
        }else{
            return 0;
        }
    }

    //lấy danh mục sản phẩm
    function danh_muc_san_pham(){
        $query = "select * from loaitaikhoan";
        include('result.php');
        return $data;
    }

    //số lượng sản phẩm của từng danh mục
    function so_luong_san_pham($id_danh_muc){
        $query = "SELECT * from taikhoangame join  danhmucgame on taikhoangame.id_danhmuc = danhmucgame.id_danhmuc where danhmucgame.id_loai_game = ".$id_danh_muc;
        include('result.php');
        if($data == NULL)
        {
            return 0;
        }
        return count($data);
    }

}
?>