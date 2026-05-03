<?php
include('models/quanLiAnhSoHuu.php');
     class quanLiAnhSoHuuController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiAnhSoHuu();
        }
    
        function list(){
            $data = $this->model->detail($_GET['idtaikhoan']);
            include('views/index.php');
        }

        function add(){
            include('views/index.php');
        }

        function store(){
            $target_dir = "../img/sanpham/";  // thư mục chứa file upload

            $anh = "";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
            
            $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
    
            if ($status_upload) { // nếu upload file không có lỗi 
                $anh =  "img/sanpham/" . basename($_FILES["anh"]["name"]);
            }

            $data = array(
                'id_tai_khoan' =>    $_GET['idtaikhoan'],
                'anh'  =>   $anh,
            );
            $this->model->add($data,$_GET['mod'],$_GET['idtaikhoan']);
        }

        function delete(){
            if(!empty($_GET['idsohuu'])){
                $this->model->delete($_GET['idsohuu'],$_GET['mod'],$_GET['idtaikhoan']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_FILES['anh'])){
                $data = $this->model->detail($_GET['idsohuu'],"1");
                include('views/index.php');
            }else{

                    $target_dir = "../img/sanpham/";  // thư mục chứa file upload

                    $anh = "";
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                    
                    $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                    
             
                    if ($status_upload) { // nếu upload file không có lỗi 
                        $anh =  "img/sanpham/" . basename($_FILES["anh"]["name"]);
                    }
                
                
                    
                 $data = array(
                    'anh'  =>   $anh,
                );

                //nếu ảnh giữ nguyên thì không thay đổi
                if($anh == ""){
                    unseT($data['anh']);
                }
        
                $this->model->edit($data,$_GET['idsohuu'],$_GET['mod'],$_GET['idtaikhoan']);
            
            }
        }
    }
?>