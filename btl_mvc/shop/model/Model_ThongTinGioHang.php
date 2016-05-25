<?php
include_once("ob_itemGioHang.php");
class Model_ThongTinGioHang{
    public function __construct(){
        include "model/connect.php";
    }
    public function LayGioHang($Username){
        $sql = 'Call LayGioHang("' . $Username. '")';
        //echo $sql;
        $kq = mysql_query($sql);
        $ListItemGioHang=array();
        while($row=mysql_fetch_array($kq)){
            $itemGioHang=new ob_itemGioHang($row['idSanPham'],$row['TenSanPham'],$row['MoTaSanPham'],
                $row['GiaSanPham'],$row['AnhSanPham'],$row['ThuocTinh'],$row['SoLuong'],
                $row['idGioHang'],$row['SoLuongBinhChon']);
            $ListItemGioHang[]=$itemGioHang;
        }
        mysql_close();
        return $ListItemGioHang;
    }
}
?>