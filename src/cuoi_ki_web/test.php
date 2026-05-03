<?php

$data = array(
   'MaLSP' =>    "1",
   'TenSP'  =>   "2",
);
         $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key." = ".$value.", ";
        }
        $f = trim($f, ",");
        echo $currentDateTime = date('Y-m-d H:i:s');;
?>

