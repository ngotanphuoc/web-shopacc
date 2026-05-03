<?php 
    class connection{
        var $conn;
        function __construct()
        {
            //Tao ket noi CSDL
            $conn= mysqli_connect("192.168.100.21","root","phuoc@2209");
                                mysqli_select_db($conn, "shopaccgame");
                                mysqli_query($conn, "SET names 'utf8'");
                                if(!$conn){
                                    echo "Không thể kết nối đến Database!".mysqli_connect_error($conn);
                                }
            return $conn;       
        }

    }
?>
