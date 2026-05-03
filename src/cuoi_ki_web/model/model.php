<?php
require_once("connect_db.php");
class model
{
    var $table;
    var $content;
    var $conn;
    function __construct()
    {
        $conn_obj = new connection();
        $this->conn = $conn_obj->__construct();
    }

    function detail($id)
    {
        $query = "select * from $this->table where $this->content = '$id'";
        include('result.php');
        return $data;
    }
   
    function layLogoShop(){
        $query = "select anhlogo from thongtinshopacc";
        include('result.php');
        return $data;
    }
}
