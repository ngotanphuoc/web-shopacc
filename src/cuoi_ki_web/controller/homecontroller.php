<?php
require_once("model/home.php");
 class homecontroller{
    var $home_model;
    function __construct()
    {
        $this->home_model = new Home();
    }

    function list(){

        $danh_muc = $this->home_model->lay_danh_muc();
        
        //lấy logo
        foreach($this->home_model->layLogoShop() as $r){
            $logo = $r['anhlogo'];
        }

        //lấy thông báo
        foreach($this->home_model->layThongBao() as $r){
            $thongbao = $r['thongbao'];
        }

        //lấy ảnh
        $banner = $this->home_model->layBanner();
        include('view/index.php');
    }
}
?>