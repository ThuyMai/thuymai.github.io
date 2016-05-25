<?php
include_once("model/ob_SanPham.php");
class Model_ChiTietSanPham{
    function __construct(){
        include "model/connect.php";
    }
    function ChiTietSanPham($idSanPham){
        $sql='Call LaySanPham('.$idSanPham.')';
        $kq=mysql_query($sql);
        $row=mysql_fetch_array($kq);
        $SanPham=new ob_SanPham($row['idSanPham'],$row['TenSanPham'],$row['MoTaSanPham'],
            $row['GiaSanPham'],$row['AnhSanPham'],$row['ThuocTinh'],$row['SoLuongBinhChon']);
        return $SanPham;
    }
}
?>