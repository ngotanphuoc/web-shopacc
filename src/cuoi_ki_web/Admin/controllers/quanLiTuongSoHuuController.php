<?php
include('models/quanLiTuongSoHuu.php');
     class quanLiTuongSoHuuController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiTuongSoHuu();
        }
    
        function list(){
            $data = $this->model->detail($_GET['idtaikhoan']);
            include('views/index.php');
        }

        function add(){
            $data = $this->model->listTuongByIdNotHave($_GET['id']);
            include('views/index.php');
        }

        function store(){
            $this->model->add_element($_POST['tuong'],$_GET['id'],$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['id'])){
                $this->model->delete($_GET['id'],$_GET['mod'],$_GET['idtaikhoan']);
            }else{
                include('views/index.php');
            }
        }
    }
?>