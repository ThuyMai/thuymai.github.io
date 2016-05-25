<?php
class Model_BinhChon{
    function __construct(){
        include "model/connect.php";
    }
    function ThemBinhChon($Username,$idSanPham){
        $sql='Call ThemBinhChon("'.$Username.'",'.$idSanPham.')';
        $kq=mysql_query($sql);
        return $kq;
    }
    function XoaBinhChon($Username,$idSanPham){
        $sql='Call XoaBinhChon("'.$Username.'",'.$idSanPham.')';
        $kq=mysql_query($sql);
        return $kq;
    }
}
?>