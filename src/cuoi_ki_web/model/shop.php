<?php
require_once("model.php");
class Shop extends model{
    // lấy dũ liệu của linh thú để đưa vào bộ lọc
    function lay_data_linh_thu()
        {
            $query = "select * from linhthu";
            include('result.php');
            return $data;
        }
    // lấy dũ liệu của trang phục để đưa vào bộ lọc
    function lay_data_trang_phuc()
        {
            $query = "select * from trangphuc";
            include('result.php');
            return $data;
        }
    // lấy dũ liệu của tướng để đưa vào bộ lọc
    function lay_data_tuong()
        {
            $query = "select * from tuong";
            include('result.php');
            return $data;
        }
    
    // in ra những tài khoản theo danh mục
    function danh_sach_sanpham_theo_danh_muc($danh_muc){
        $query = "SELECT * from taikhoangame";
        include('result.php');
        return $data;
    }

    // dem so tướng theo id
    function dem_so_tuong_theo_id($id)
    {
        $query = "select count(DISTINCT id) as sltuong from tuongsohuu where id_tai_khoan = '".$id."'";
        include('result.php');
        return $data;
    }
    // dem so trang phục theo id
    function dem_so_trang_phuc_theo_id($id)
    {
        $query = "select count(DISTINCT id) as sltrangphuc from trangphucsohuu where id_tai_khoan = '".$id."'";
        include('result.php');
        return $data;
    }
     // dem so linh thú theo id
     function dem_so_linh_thu_theo_id($id)
     {
         $query = "select count(DISTINCT id) as sllinhthu from linhthusohuu where id_tai_khoan = '".$id."'";
         include('result.php');
         return $data;
     }
     
    // hàm đếm những tài khoản được lọc theo bộ lọc
    function dem_so_tai_khoan($danh_muc, $linh_thu="",$tuong="",$gia_tien_tu="",$gia_tien_den="",$trang_phuc="",$rank=""){
        if($gia_tien_tu != "" and $gia_tien_den != "")
        {   

            $query1 = " and taikhoangame.rank LIKE '%".$rank."%' and taikhoangame.giahientai between ".$gia_tien_tu." and ".$gia_tien_den;
            
        }else if($gia_tien_tu == "" and $gia_tien_den != ""){

            $query1 = " and taikhoangame.giahientai <= ".$gia_tien_den;

        }else if($gia_tien_tu == "" and $gia_tien_den == ""){

            $query1 = "";
        
        }
        else if($gia_tien_tu != "" and $gia_tien_den == "")
        {

            $query1 = " and taikhoangame.giahientai >= ".$gia_tien_tu;
           
        }

        // truong hop chi chon trang phuc
        if($trang_phuc!="" and $linh_thu == "" and $tuong == "")
        {
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan ";
        }
        //truong hop chi chon linh thu
        else if($trang_phuc=="" and $linh_thu != "" and $tuong == ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM taikhoangame join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan ";
        }
        //truong hop chi chon tuong
        else if($trang_phuc=="" and $linh_thu == "" and $tuong != ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM taikhoangame join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan";
        }
        //truong hop chon trang phuc va linh thu
        else if($trang_phuc!="" and $linh_thu != "" and $tuong == ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM (taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and linhthusohuu.id LIKE '%".$linh_thu."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan";
        }
        //truong hop chon trang phuc va tuong
        else if($trang_phuc!="" and $linh_thu == "" and $tuong != ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM (taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan ";
        }
        //truong hop chon linh thu va tuong
        else if($trang_phuc=="" and $linh_thu != "" and $tuong != ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM (taikhoangame join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan) join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan ";
        }
        // truong hop chon het 
        else if($trang_phuc!="" and $linh_thu != "" and $tuong != ""){
            $query = "SELECT  count(DISTINCT taikhoangame.id_tai_khoan) FROM ((taikhoangame JOIN tuongsohuu ON taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan) join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) JOIN linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and tuongsohuu.id LIKE '%".$tuong."%' and trangphucsohuu.id LIKE '%".$trang_phuc."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan ";
        }
        // truong hop khong chon 
       else if($trang_phuc=="" and $linh_thu == "" and $tuong == ""){
           $query = "SELECT  count(id_tai_khoan) as tong FROM taikhoangame where taikhoangame.trangthai = 1 and id_danhmuc = ".$danh_muc." and taikhoangame.rank LIKE '%".$rank."%' ".$query1;
           $data = $this->conn->query($query)->fetch_assoc();
           include('result.php');
           foreach($data as $r){
            $kq = $r['tong'];
           }
           return $kq;
        }

        $result = $this->conn->query($query);

        $data = mysqli_num_rows($result);

        return $data;
    }

    // hàm in ra danh sách những tài khoản được lọc theo bộ lọc
    function danh_sach_san_pham_sau_khi_loc($danh_muc, $linh_thu="",$tuong="",$gia_tien_tu="",$gia_tien_den="",$trang_phuc="",$rank="",$a,$b){
        if($gia_tien_tu != "" and $gia_tien_den != "")
        {   

            $query1 = " and taikhoangame.rank LIKE '%".$rank."%' and taikhoangame.giahientai between ".$gia_tien_tu." and ".$gia_tien_den;
            
        }else if($gia_tien_tu == "" and $gia_tien_den != ""){

            $query1 = " and taikhoangame.giahientai <= ".$gia_tien_den;

        }else if($gia_tien_tu == "" and $gia_tien_den == ""){

            $query1 = "";
        
        }
        else if($gia_tien_tu != "" and $gia_tien_den == "")
        {

            $query1 = " and taikhoangame.giahientai >= ".$gia_tien_tu;
           
        }

         //    truong hop chi chon trang phuc
         if($trang_phuc!="" and $linh_thu == "" and $tuong == "")
         {
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         //truong hop chi chon linh thu
         else if($trang_phuc=="" and $linh_thu != "" and $tuong == ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM taikhoangame join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         //truong hop chi chon tuong
         else if($trang_phuc=="" and $linh_thu == "" and $tuong != ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM taikhoangame join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         //truong hop chon trang phuc va linh thu
         else if($trang_phuc!="" and $linh_thu != "" and $tuong == ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM (taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and linhthusohuu.id LIKE '%".$linh_thu."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         //truong hop chon trang phuc va tuong
         else if($trang_phuc!="" and $linh_thu == "" and $tuong != ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM (taikhoangame join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and trangphucsohuu.id LIKE '%".$trang_phuc."%' and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         //truong hop chon linh thu va tuong
         else if($trang_phuc=="" and $linh_thu != "" and $tuong != ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc  FROM (taikhoangame join linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan) join tuongsohuu on taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and tuongsohuu.id LIKE '%".$tuong."%' and taikhoangame.rank LIKE '%".$rank."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         // truong hop chon het 
         else if($trang_phuc!="" and $linh_thu != "" and $tuong != ""){
             $query = "SELECT taikhoangame.id_tai_khoan, taikhoangame.anh,taikhoangame.rank,taikhoangame.giahientai,taikhoangame.id_danhmuc FROM ((taikhoangame JOIN tuongsohuu ON taikhoangame.id_tai_khoan = tuongsohuu.id_tai_khoan) join trangphucsohuu on taikhoangame.id_tai_khoan = trangphucsohuu.id_tai_khoan) JOIN linhthusohuu on taikhoangame.id_tai_khoan = linhthusohuu.id_tai_khoan WHERE taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$danh_muc." and linhthusohuu.id LIKE '%".$linh_thu."%' and tuongsohuu.id LIKE '%".$tuong."%' and trangphucsohuu.id LIKE '%".$trang_phuc."%' ".$query1." GROUP BY taikhoangame.id_tai_khoan limit ".$a.",".$b;
         }
         // truong hop khong chon 
        else if($trang_phuc=="" and $linh_thu == "" and $tuong == ""){
              $query = "SELECT  *  FROM taikhoangame where taikhoangame.trangthai = 1 and id_danhmuc = ".$danh_muc." and taikhoangame.rank LIKE '%".$rank."%' ".$query1." limit ".$a.",".$b;
        }
        include('result.php');
        return $data;
    }

    //hàm lấy thông tin của các cấp độ tài khoản may mắn
    function lay_data_cap_do_may_man($danhmuc){
        $query = "select * from capdaotaikhoanvanmay WHERE capdaotaikhoanvanmay.id_cap_do = (select danhmucgame.id_cap_do from danhmucgame WHERE danhmucgame.id_danhmuc = ".$danhmuc.")";
        include('result.php');
        return $data;
    }
    
    //danh sách tài khoản vận may dưới 20k
    function danh_sach_tai_khoan_van_may_duoi_20k($gioihan,$id_danh_muc){
        $query = "select * from taikhoangame where taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$id_danh_muc." and taikhoangame.giahientai <= 20000 ORDER by RAND () LIMIT ".$gioihan;
        include('result.php');
        return $data;
    }

    //danh sách tài khoản vận may từ 20 đến 50k
    function danh_sach_tai_khoan_van_may_20k_50k($gioihan,$id_danh_muc){
        $query = "select * from taikhoangame where taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$id_danh_muc." and taikhoangame.giahientai between 20001 and 50000 ORDER by RAND () LIMIT ".$gioihan;
        include('result.php');
        return $data;
    }

    //danh sách tài khoản vận may từ 50k đén 200k
    function danh_sach_tai_khoan_van_may_50k_200k($gioihan,$id_danh_muc){
        $query = "select * from taikhoangame where taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$id_danh_muc." and taikhoangame.giahientai between 50001 and 200000 ORDER by RAND () LIMIT ".$gioihan;
        include('result.php');
        return $data;
    }

    //danh sách tài khoản vận may từ 200k đến 500k
    function danh_sach_tai_khoan_van_may_200k_500k($gioihan,$id_danh_muc){
        $query = "select * from taikhoangame where taikhoangame.trangthai = 1 and taikhoangame.id_danhmuc = ".$id_danh_muc." and taikhoangame.giahientai between 200001 and 500000 ORDER by RAND () LIMIT ".$gioihan;
        include('result.php');
        return $data;
    }

    //lấy thông tin khuyến mãi theo id
    function listKhuyenMaiTheoId($id){
        $query = "select * from khuyenmai where khuyenmai.id_km = $id";
        include('result.php');
        return $data;
    }
}
?>