<?php
include('models/quanLiThongTinShop.php');
     class quanLiThongTinShopController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiThongTinShop();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function delete(){
            if(!empty($_GET['id'])){
                $this->model->delete($_GET['id'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_FILES['anh'])){
                $data = $this->model->detail($_GET['id']);
                include('views/index.php');
            }else{    
                
                $target_dir = "../img/logo/";  // thư mục chứa file upload

                $anh = "";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                
                $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
        
                if ($status_upload) { // nếu upload file không có lỗi 
                    $anh =  "img/logo/" . basename($_FILES["anh"]["name"]);
                }

                $data = array(
                    'anhlogo'  =>   $anh,
                    'thongbao' => $_POST['thongbao'],
                );
                
                //nếu ảnh giữ nguyên thì không thay đổi
                if($anh == ""){
                    unseT($data['anhlogo']);
                }
                
                $this->model->edit($data,$_GET['id'],$_GET['mod']);
            
            }
        }
    }
?>