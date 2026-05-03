<?php
include('models/quanLiSanPham.php');
     class quanLiSanPhamController{
        var $model;
        function __construct()
        {
            $this->model = new quanLiSanPham();
        }
    
        function list(){
            $data = $this->model->list();
            include('views/index.php');
        }

        function add(){
            $data = $this->model->layTenDanhMuc();
            $data1 = $this->model->layTenKhuyenMai();
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
                'taikhoan' =>    $_POST['taikhoan'],
                'matkhau'  =>   $_POST['matkhau'],
                'anh'  =>   $anh,
                'rank'  =>   $_POST['rank'],
                'id_km' => $_POST['khuyenmai'],
                'giahientai'  =>   $_POST['gia'],
                'id_danhmuc'  =>   $_POST['danhmuc'],
                'trangthai'  =>   $_POST['trangthai'],
                'sl_tuong'  =>   $_POST['sltuong'],
                'sl_trang_phuc'  =>   $_POST['sltrangphuc'],
                'sl_linh_thu'  =>   $_POST['sllinhthu'],
            );
            $this->model->add($data,$_GET['mod']);
        }

        function delete(){
            if(!empty($_GET['idtaikhoan'])){
                $this->model->delete($_GET['idtaikhoan'],$_GET['mod']);
            }else{
                include('views/index.php');
            }
        }

        function edit(){
            if(empty($_POST['taikhoan'])){
                $danhmuc = $this->model->layTenDanhMuc();
                $khuyemmai = $this->model->layTenKhuyenMai();
                $data = $this->model->detail($_GET['id']);
              
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
                    'taikhoan' =>    $_POST['taikhoan'],
                    'matkhau'  =>   $_POST['matkhau'],
                    'anh'  =>   $anh,
                    'rank'  =>   $_POST['rank'],
                    'giahientai'  =>   $_POST['gia'],
                    'id_km'  =>   $_POST['khuyenmai'],
                    'id_danhmuc'  =>   $_POST['danhmuc'],
                    'trangthai'  =>   $_POST['trangthai'],
                    'sl_tuong'  =>   $_POST['sltuong'],
                    'sl_trang_phuc'  =>   $_POST['sltrangphuc'],
                    'sl_linh_thu'  =>   $_POST['sllinhthu'],
                );
                    //nếu ảnh giữ nguyên thì không thay đổi
                    if($anh == ""){
                        unseT($data['anh']);
                    }
                $this->model->edit($data,$_GET['id'],$_GET['mod']);
            }
        }


    }
?>