<?php
require_once("connect_db.php");
class model
{
    var $conn;
    var $table;
    var $content;
    var $content1;
    function __construct()
    {
        $conn_obj = new connection();
        $this->conn = $conn_obj->__construct();
    }

    //Xóa 
    //$id1 để cho thư viện tướng linh thú và trangphuc
    function delete($id,$mod,$id1="")
    {
        if($id1 != "")
        {
            $query = "DELETE from ".$this->table." where ".$this->table.".".$this->content1." = '".$id."'";
        }else{
            $query = "DELETE from ".$this->table." where ".$this->table.".".$this->content." = '".$id."'";
        }
       
        try 
        {
            $status = $this->conn->query($query);
            if($status == true)
            {
               setcookie('msg', 'Xóa thành công', time() + 2); 
            }else{
                setcookie('msg1', 'Xóa không thành công', time() + 2);
            }
            
        } 
        catch (Exception $e) 
        {    
            setcookie('msg1', 'Xóa không thành công', time() + 2);
        }
        if($id1!= "")
        {
            header('Location: ?mod='.$mod."&idtaikhoan=".$id1); 
        }else{
            header('Location: ?mod='.$mod);
        }
        
    }

    //lấy thông tin chi tiết theo id 
    function detail($id,$mark=""){
        //mark để đánh dấu thêm chi tiết lồng nhau hay không
        if($mark!=""){
            $query = "select * from $this->table where ".$this->table.".".$this->content1." = '$id'";
        }else{
            $query = "select * from $this->table where ".$this->table.".".$this->content." = '$id'";
        }
        include('result.php');
        return $data;
    }

    //lấy danh sách
    function list(){
        $query = "select * from $this->table";
        include('result.php');
        return $data;
    }

    //thêm các tướng,linh thú, trang phục sở hữu 
    function add_element($data,$id_taikhoan,$mod){

        foreach($data as $r)
        {
            $query = "Insert into $this->table (id_tai_khoan,id) values ('$id_taikhoan','$r')";
            try 
            {
                $result = $this->conn->query($query);
            } 
            catch (Exception $e) 
            {    
                setcookie('msg1',$data,time()+2,"/");
                header('Location: ?mod='.$mod.'&&idtaikoan='.$id_taikhoan);
                return;
            }
        }
                setcookie('msg','Thêm tài khoản game thành công',time()+2,"/");
                header('Location: ?mod='.$mod.'&idtaikhoan='.$id_taikhoan);
    }

    //Thêm 
    function add($data,$mod,$idtaikhoan=""){
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= "$this->table".".".$key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "Insert into ".$this->table." ($f) values ($v)";
        try 
        {
            $result = $this->conn->query($query);
            setcookie('msg','Thêm thành công',time()+2,"/");
            if($idtaikhoan != ""){
                header('Location: ?mod='.$mod.'&idtaikhoan='.$idtaikhoan); 
            }else{
                header('Location: ?mod='.$mod);
            }
        } 
        catch (Exception $e) 
        {    
            setcookie('msg1',$e,time()+2,"/");
            if($idtaikhoan != ""){
                header('Location: ?mod='.$mod.'&act=add&idtaikhoan='.$idtaikhoan);
            }else{
                header('Location: ?mod='.$mod.'&act=add');
            }
        }
    }

    //sửa
    function edit($data,$id,$mod,$idtaikhoan=""){
        $f = "";
        foreach ($data as $key => $value) {
            $f .= "$this->table.".$key . " = '".$value."' ,";
        }
        $f = trim($f, ",");

        //kiểm tra có phải là chỉnh sửa của phần tử nằm bên trong hay không
        if($idtaikhoan != ""){
            $query = "UPDATE $this->table SET $f where $this->table.$this->content1 = '".$id."'";
        }else{
            $query = "UPDATE $this->table SET $f where $this->table.$this->content = '".$id."'";
        }
      
        try{
            $result = $this->conn->query($query);
            setcookie('msg', 'Cập nhật thành công', time() + 2);
            if($idtaikhoan != ""){
                header('Location: ?mod='.$mod.'&idtaikhoan='.$idtaikhoan);
            }else{
                header('Location: ?mod='.$mod);
            }
        }catch(Exception $e)
        {
            setcookie('msg1', 'Cập nhật không thành công', time() + 2);
            if($idtaikhoan != ""){
                header('Location: ?mod='.$mod.'&act=edit&idsohuu='.$id.'&idtaikhoan='.$idtaikhoan);
            }else{
                header('Location: ?mod='.$mod.'&act=edit&id='.$id);
            }
        }
    }

}
