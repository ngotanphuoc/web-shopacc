<?php
require_once("model/shop.php");
 class shop_controller{
    var $shop_model;
    function __construct()
    {
        $this->shop_model = new Shop();
    }

    function list(){
        $id_loai_game = $_GET['id_loai_game'];
        $danh_muc = $_GET['dm'];
        $ten_danh_muc = $_GET['ten_dm'];

   
            $data_linh_thu = $this->shop_model->lay_data_linh_thu();
            $data_trang_phuc = $this->shop_model->lay_data_trang_phuc();
            $data_tuong = $this->shop_model->lay_data_tuong();
            
                //lấy logo
        foreach($this->shop_model->layLogoShop() as $r){
            $logo = $r['anhlogo'];
        }

            $linhthu = isset($_GET['linhthu']) ? $_GET['linhthu']: "";
            $tuong = isset($_GET['tuong']) ? $_GET['tuong']: "";
            $trangphuc = isset($_GET['trangphuc']) ? $_GET['trangphuc']: "";
            $giatientu = isset($_GET['giatientu']) ? $_GET['giatientu']: "";
            $giatienden = isset($_GET['giatienden']) ? $_GET['giatienden']: "";
            $rank = isset($_GET['hang']) ? $_GET['hang']: "";  

            //phân trang
            $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
            $limit = 9;
            $start = ($id - 1) * $limit;

            $list_tai_khoan = $this->shop_model->danh_sach_san_pham_sau_khi_loc($danh_muc,$linhthu,$tuong,$giatientu,$giatienden,$trangphuc,$rank,$start,$limit);
            $tong_so_tai_khoan = $this->shop_model->dem_so_tai_khoan($danh_muc,$linhthu,$tuong,$giatientu,$giatienden,$trangphuc);
        include('view/index.php');
    }
}
?>