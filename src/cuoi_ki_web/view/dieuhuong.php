<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home.php");
        break;
    case "shop":
        require_once("shop/shop_view.php");
        break;
    case "detail":
        require_once("detail_view.php");
        break;
    case "quanlitaikhoan":
        require_once("quan_li_tai_khoan_view.php");
        break;
    default:
        require_once("home.php");
        break;
}
