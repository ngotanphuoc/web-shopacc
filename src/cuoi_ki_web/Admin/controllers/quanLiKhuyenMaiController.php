<?php
include('models/quanLiKhuyenMai.php');
     class quanLiKhuyenMaiController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiKhuyenMai();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            include('views/index.php');
        }

        function store(){
            $data = array(
                'ten'  =>   $_POST['ten'],
                'giatri'  =>   $_POST['giatri'],
            );
            $this->model->add($data,$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['id'])){
                $this->model->delete($_GET['id'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_POST['ten'])){
                $data = $this->model->detail($_GET['id']);
                include('views/index.php');
            }else{     
                 $data = array(
                    'ten'  =>   $_POST['ten'],
                    'giatri'  =>    $_POST['giatri'],
                );
                $this->model->edit($data,$_GET['id'],$_GET['mod']);
            
            }
        }
    }
?>