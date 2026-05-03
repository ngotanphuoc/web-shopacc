<?php
include('models/QL_danh_muc.php');
     class quanlidanhmuccontroller{
       var $model;
        function __construct()
        {
            $this->model = new quanlidanhmuc();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            $data = $this->model->list_loai_tai_khoan();
            include('views/index.php');
        }

        function store(){
            $target_dir = "../img/danhmuc/";  // thư mục chứa file upload

            $anh = "";
            $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
            
            $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
    
            if ($status_upload) { // nếu upload file không có lỗi 
                $anh =  "img/danhmuc/" . basename($_FILES["anh"]["name"]);
            }

            $data = array(
                'ten' =>    $_POST['tendanhmuc'],
                'anh'  =>   $anh,
                'id_loai_game'  =>   $_POST['idloaigame'],
            );
           $this->model->add($data,$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['danhmuc'])){
                $this->model->delete($_GET['danhmuc'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_POST['tendanhmuc'])){
                
                $data1 = $this->model->list_loai_tai_khoan();
                $data = $this->model->detail($_GET['danhmuc']);
                foreach($data as $r){
                    $tendanhmuc = $r['ten'];
                    $iddanhmuc = $r['id_danhmuc'];
                    $anh = $r['anh'];
                    $idloaigame = $r['id_loai_game'];
                }
                include('views/index.php');
            }else{

                $target_dir = "../img/danhmuc/";  // thư mục chứa file upload

                $anh = "";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]); // link sẽ upload file lên
                
                $status_upload = move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                
         
                if ($status_upload) { // nếu upload file không có lỗi 
                    $anh =  "img/danhmuc/" . basename($_FILES["anh"]["name"]);
                }
            
            
                
             $data = array(
                'ten'  =>   $_POST['tendanhmuc'],
                'anh'  =>   $anh,
                'id_loai_game'  => $_POST['idloaigame'],
            );

            //nếu ảnh giữu nguyên thì không thay đổi
            if($anh == ""){
                unset($data['anh']);
            }

                $this->model->edit($data,$_GET['iddanhmuc'],$_GET['mod']);
            }
        }
        function logout(){
            session_destroy();
            header('location: ../');
        }


    }
?>