<?php
include('models/quanLiTuong.php');
     class quanLiTuongController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiTuong();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            include('views/index.php');
        }

        function store(){
            $target_dir = "../img/tuong/";  // thư mục chứa file upload

            $anh = "";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
            
            $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
    
            if ($status_upload) { // nếu upload file không có lỗi 
                $anh =  "img/tuong/" . basename($_FILES["anh"]["name"]);
            }
    
            $data = array(
                'ten'  =>   $_POST['ten'],
                'anh'  =>   $anh,
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

                    $target_dir = "../img/tuong/";  // thư mục chứa file upload

                    $anh = "";
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                    
                    $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                    
             
                    if ($status_upload) { // nếu upload file không có lỗi 
                        $anh =  "img/tuong/" . basename($_FILES["anh"]["name"]);
                    }
                
                
                    
                 $data = array(
                    'ten'  =>   $_POST['ten'],
                    'anh'  =>   $anh,
                );

                //nếu ảnh giữu nguyên thì không thay đổi
                if($anh == ""){
                    unseT($data['anh']);
                }
        
                $this->model->edit($data,$_GET['id'],$_GET['mod']);
            
            }
        }
    }
?>