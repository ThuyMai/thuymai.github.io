<?php
class Model_PhanHoi{
    function __construct(){
        include "model/connect.php";
    }
    function GuiPhanHoi($HoVaTen,$Email,$NoiDung){
        $sql='INSERT INTO phanhoi(HoVaTen,Email,NoiDung) VALUES("'.$HoVaTen.'","'.$Email.'","'.$NoiDung.'")';
        $kq=mysql_query($sql);
        echo $sql;
        return $kq;
    }
}
?>