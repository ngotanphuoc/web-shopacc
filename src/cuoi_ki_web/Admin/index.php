<?php
    session_start();
        if($_SESSION['maquyen']==2){
            $mod = isset($_GET['mod']) ? $_GET['mod'] : "home";
            $act = isset($_GET['act']) ? $_GET['act'] : "admin";
        }else if($_SESSION['maquyen']==3){
            $mod = isset($_GET['mod']) ? $_GET['mod'] : "quanlidanhmuc";
            $act = isset($_GET['act']) ? $_GET['act'] : "list";
        }else{
            header('location: ../?act=home');
        }
            switch($mod){
                case 'home':
                    require_once('controllers/controller_home_admin.php');
                    $obj = new home_admin_controller();
                    switch($act){
                        case 'admin':
                            $obj->list(); 
                            break;
                        case 'logout':
                            $obj->logout();
                            break;
                        default:
                            $obj->list(); 
                            break;
                    }
                    break;
                case 'quanlitaikhoan':
                    require_once('controllers/quanlinguoidungcontroller.php');
                    $obj = new quanlinguoidungcontroller();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlidanhmuc':
                    require_once('controllers/QL_danh_muc_controller.php');
                    $obj1 = new quanlidanhmuccontroller();
                    switch($act){
                        case 'list':
                            $obj1->list();
                            break;
                        case 'logout':
                            $obj1->logout();
                            break;
                        case 'add':
                            $obj1->add();
                            break;
                        case 'store':
                            $obj1->store();
                            break;
                        case 'delete':
                            $obj1->delete();
                            break;
                        case 'edit':
                            $obj1->edit();
                            break;
                        default:
                            $obj1->list();
                            break;
                    }
                    break;
                case 'quanlisanpham':
                    require_once('controllers/quanLiSanPhamController.php');
                    $obj = new quanLiSanPhamController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlituongsohuu':
                    require_once('controllers/quanLiTuongSoHuuController.php');
                    $obj = new quanLiTuongSoHuuController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlitrangphucsohuu':
                    require_once('controllers/quanLiTrangPhucSoHuuController.php');
                    $obj = new quanLiTrangPhucSoHuuController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlilinhthusohuu':
                    require_once('controllers/quanLiLinhThuSoHuuController.php');
                    $obj = new quanLiLinhThuSoHuuController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlituong':
                    require_once('controllers/quanLiTuongController.php');
                    $obj = new quanLiTuongController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlitrangphuc':
                    require_once('controllers/quanLiTrangPhucController.php');
                    $obj = new quanLiTrangPhucController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlilinhthu':
                    require_once('controllers/quanLiLinhThuController.php');
                    $obj = new quanLiLinhThuController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlikhuyenmai':
                    require_once('controllers/quanLiKhuyenMaiController.php');
                    $obj = new quanLiKhuyenMaiController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlianhsohuu':
                    require_once('controllers/quanLiAnhSoHuuController.php');
                    $obj = new quanLiAnhSoHuuController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;

                 case 'quanlibanner':
                    require_once('controllers/quanLiBannerController.php');
                    $obj = new quanLiBannerController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'add':
                            $obj->add();
                            break;
                        case 'store':
                            $obj->store();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
                case 'quanlithongtinshop':
                    require_once('controllers/quanLiThongTinShopController.php');
                    $obj = new quanLiThongTinShopController();
                    switch($act){
                        case 'list':
                            $obj->list();
                            break;
                        case 'delete':
                            $obj->delete();
                            break;
                        case 'edit':
                            $obj->edit();
                            break;
                        default:
                            $obj->list();
                            break;
                    }
                    break;
            }

?>