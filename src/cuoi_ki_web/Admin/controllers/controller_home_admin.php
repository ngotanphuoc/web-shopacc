<?php
include('models/home_admin.php');
     class home_admin_controller{
        var $home_model;
        function __construct()
        {
            $this->home_model = new home_admin();
        }
    
        function list(){
            $so_luong_khach_hang = $this->home_model->so_luong_khach_hang();
            $doanh_thu_thang_ht = $this->home_model->doanh_thu_thang_hien_tai();
            $doanh_thu_nam_ht = $this->home_model->doanh_thu_nam_hien_tai();
            $list_category = $this->home_model->danh_muc_san_pham();
            include('views/index.php');
        }
        function logout(){
            session_destroy();
            header('location: ../');
        }
    }
?>