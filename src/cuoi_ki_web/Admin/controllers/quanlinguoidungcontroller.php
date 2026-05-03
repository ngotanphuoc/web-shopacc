<?php
include('models/taikhoannguoidung.php');
     class quanlinguoidungcontroller{
        var $model;
        function __construct()
        {
            $this->model = new taikhoannguoidung();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            $data_quyen = $this->model->maquyen();
            include('views/index.php');
        }

        function store(){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentDateTime = date('Y-m-d H:i:s');
            $data = array(
                'taikhoan' =>    $_POST['taikhoan'],
                'matkhau'  =>   $_POST['matkhau'],
                'sodu'  =>   $_POST['sodu'],
                'email'  =>   $_POST['email'],
                'maquyen'  =>   $_POST['quyenhan'],
                'ngaytao' =>    $currentDateTime,
            );
            $this->model->add($data,$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['taikhoan'])){
                $this->model->delete($_GET['taikhoan'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_POST['taikhoan'])){
                $data_quyen = $this->model->maquyen();
                $data = $this->model->detail($_GET['taikhoan']);
                foreach($data as $r){
                    $taikhoan = $r['taikhoan'];
                    $matkhau = $r['matkhau'];
                    $email = $r['email'];
                    $sodu = $r['sodu'];
                    $maquyen = $r['maquyen'];
                }
                include('views/index.php');
            }else{
                $data = array(
                    'taikhoan' =>    $_POST['taikhoan'],
                    'matkhau'  =>   $_POST['matkhau'],
                    'email'  =>   $_POST['email'],
                    'sodu'  =>   $_POST['sodu'],
                    'maquyen'  =>   $_POST['quyenhan'],
                );
                $this->model->edit($data,$_GET['taikhoan'],$_GET['mod']);
            }
        }


    }
?>