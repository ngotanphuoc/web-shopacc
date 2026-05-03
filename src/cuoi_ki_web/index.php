<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('controller/homecontroller.php');
		$controller_obj = new homecontroller();
		$controller_obj->list();
        break;
	case 'shop':
        require_once('controller/shopcontroller.php');
		$controller_obj = new shop_controller();
		$controller_obj->list();
        break;
	case 'detail':
		require_once('controller/detailcontroller.php');
		$controller_obj = new detailcontroller();
		$controller_obj->list();
        break;
	case 'quanlitaikhoan':
		require_once('controller/quanlitaikhoancontroller.php');
		$controller_obj = new quanlitaikhoancontroller();
		$controller_obj->list();			
		break;
    default:
		require_once('controller/homecontroller.php');
		$controller_obj = new homecontroller();
		$controller_obj->list();
        break;
}
