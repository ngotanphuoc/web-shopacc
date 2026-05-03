<?php
include('models/quanLiBanner.php');
     class quanLiBannerController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiBanner();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            include('views/index.php');
        }

        function store(){
            $target_dir = "../img/banner/";  // thư mục chứa file upload

                $anh = "";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                
                $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
        
                if ($status_upload) { // nếu upload file không có lỗi 
                    $anh =  "img/banner/" . basename($_FILES["anh"]["name"]);
                }
            $data = array(
                'anh'  =>   $anh,
            );
            $this->model->add($data,$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['idbanner'])){
                $this->model->delete($_GET['idbanner'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_FILES['anh'])){
                $data = $this->model->detail($_GET['idbanner']);
                include('views/index.php');
            }else{    
                
                $target_dir = "../img/banner/";  // thư mục chứa file upload

                $anh = "";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                
                $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
        
                if ($status_upload) { // nếu upload file không có lỗi 
                    $anh =  "img/banner/" . basename($_FILES["anh"]["name"]);
                }

                $data = array(
                    'anh'  =>   $anh,
                );
                
                //nếu ảnh giữ nguyên thì không thay đổi
                if($anh == ""){
                    unseT($data['anh']);
                }
                
                $this->model->edit($data,$_GET['idbanner'],$_GET['mod']);
            
            }
        }
    }
?>