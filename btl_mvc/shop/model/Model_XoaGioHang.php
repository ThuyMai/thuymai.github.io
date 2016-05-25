<?php
class Model_XoaGioHang{
    function __construct(){
        include "model/connect.php";
    }
    function XoaGioHang(){
        $sql='Call XoaGioHang('.$_POST['idGioHang'].')';
        $kq=mysql_query($sql);
        return $kq;
    }
}
?>