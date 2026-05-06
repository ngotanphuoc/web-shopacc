<?php 
    class connection{
        var $conn;
        function __construct()
        {
            //Tao ket noi CSDL
            $conn= mysqli_connect("database-mysql.ch2wsgi4quts.ap-southeast-1.rds.amazonaws.com","phuoc","phuoc2209");
                                mysqli_select_db($conn, "shopaccgame");
                                mysqli_query($conn, "SET names 'utf8'");
                                if(!$conn){
                                    echo "Không thể kết nối đến Database!".mysqli_connect_error($conn);
                                }
            return $conn;       
        }

    }
?>
