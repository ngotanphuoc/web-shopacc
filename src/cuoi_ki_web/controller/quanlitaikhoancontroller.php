<?php
require_once("model/quanlitaikhoan.php");
 class quanlitaikhoancontroller{
    var $model;
    function __construct()
    {
        $this->model = new quanlitaikhoan();
    }

    function list(){      
        $data = $this->model->lay_data_tk_da_mua($_SESSION['username']);
           //lấy logo
           foreach($this->model->layLogoShop() as $r){
            $logo = $r['anhlogo'];
        }
        include('view/index.php');
    }
}
?>