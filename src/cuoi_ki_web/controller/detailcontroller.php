<?php
require_once("model/detail.php");
require_once("model/shop.php");
 class detailcontroller{
    var $detail_model;
    var $shop_model;
    function __construct()
    {
        $this -> detail_model = new Detail();
        $this -> shop_model = new Shop();
    }

    function list(){
        $id_tai_khoan_game = $_GET['id_taikhoan'];
        $id_loai_game = $_GET['id_loai_game'];

        //lấy ảnh của tài khoản game 
        $dataAnh = $this->detail_model->layAnhTaiKhoanTheoId($id_tai_khoan_game);
            //lấy dữ liệu 
            $data_tuong = $this->detail_model->lay_danh_sach_tuong_theo_id($id_tai_khoan_game);
            $data_trang_phuc = $this->detail_model->lay_danh_sach_trang_phuc_theo_id($id_tai_khoan_game);
            $data_linh_thu = $this->detail_model->lay_danh_sach_linh_thu_theo_id($id_tai_khoan_game);
            //đếm dữ liệu
            foreach($this->detail_model->laySlTrangPhucLinhThuTrangPhuc($id_tai_khoan_game) as $r){
                $sl_tuong = $r['sl_tuong'];
                $sl_trang_phuc = $r['sl_trang_phuc'];
                $sl_linh_thu = $r['sl_linh_thu'];
            }
            
                //lấy logo
                foreach($this->detail_model->layLogoShop() as $r){
                    $logo = $r['anhlogo'];
                }

            //lấy dữ liệu rank và giá tiền
            foreach($this->detail_model->lay_data_rank_va_gia_va_trang_thai_theo_id($id_tai_khoan_game) as $r)
            {
                $gia = $r['giahientai'];
                $rank = $r['rank'];
                $trangthai = $r['trangthai'];
            }
            //lấy danh mục và id danh mục
            foreach($this->detail_model->lay_ten_va_id_danh_muc_theo_id($id_tai_khoan_game) as $r)
            {
                $id_danh_muc = $r['id_danhmuc'];
                $danh_muc = $r['ten'];
            }
            $dataTaiKhoan = $this->detail_model->detail($id_tai_khoan_game);
            $data_tk_lien_quan = $this->detail_model->danh_sach_tai_khoan_lien_quan($id_danh_muc,$id_tai_khoan_game);
        
       include('view/index.php');
    }
}
?>