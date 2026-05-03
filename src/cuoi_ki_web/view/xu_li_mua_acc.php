<?php
    include('../model/detail.php');
    session_start();
    $obj = new Detail();
    $gia = $_GET['gia'];
    $id_tai_khoan = $_GET['id_tai_khoan'];
    $id_km = $_GET['id_km'];

    //kiểm tra số dư có đủ không
    $s = (int)$_SESSION['sodu'] - (int)$gia;
    $gia = (int)$gia;
    if($s >= 0)
    {
        if($obj->cap_nhat_so_du_tai_khoan_nguoi_dung($_SESSION['username'],$s) == 1)
        {
            if($obj->mua_tai_khoan_game($_SESSION['username'],$id_tai_khoan,$gia,$id_km) == 1){

                if($obj->thay_doi_trang_thai_da_mua($id_tai_khoan) == 1)
                {
                    $_SESSION['sodu'] = $s;
                    echo 1;
                }else{
                    echo "lỗi cập nhật trạng thái tài khoản game.";
                }
            }else{
                echo "lỗi cập nhật thông tin tài khoản được mua";
            }
        }else{
            echo "lỗi cập nhật số dư.";
        }
    }else{
        echo "Không đủ số dư tài khoản bạn vui lòng nạp thẻ để mua tài khoản này.";
    }
?>