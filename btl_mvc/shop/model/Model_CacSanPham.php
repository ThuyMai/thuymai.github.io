<?php
include_once("ob_SanPham.php");
class Model_CacSanPham{
    function __construct(){
        include "model/connect.php";
    }


    public function LayTatCaSanPham($user,$p){
        if($user!=''){
            $sql='Call LayToanBoSanPham("'.$user.'",'.$p.')';
        }else{
            $sql='Call PhanTrangSanPhamShop('.$p.')';
        }
        $kq=mysql_query($sql);
        $ListSanPham="";
        while($row=mysql_fetch_array($kq)){
            if(isset($_SESSION['user'])){
                $BinhChon=$row['DuocBinhChon'];
            }else{
                $BinhChon=$row['SoLuongBinhChon'];
            }
            $SanPham=new ob_SanPham($row['idSanPham'],$row['TenSanPham'],$row['MoTaSanPham'],
                $row['GiaSanPham'],$row['AnhSanPham'],$row['ThuocTinh'],$BinhChon);
            $ListSanPham[]=$SanPham;
        }
        mysql_close();
        return $ListSanPham;
    }


    public function TimKiem($TuKhoa){
        if(isset($_POST['user'])){
            $sql='Call KhachHang_TimKiem("'.$_SESSION['user'].'","'.$TuKhoa.'")';
        }else{
            $sql='Call KhachVangLai_TimKiem("'.$TuKhoa.'")';
        }
        $kq=mysql_query($sql);
        $ListSanPham=array();
        while($row=mysql_fetch_array($kq)){
            if(isset($_SESSION['user'])){
                $BinhChon=$row[6];
            }else{
                $BinhChon=$row['SoLuongBinhChon'];
            }
            $SanPham=new ob_SanPham($row['idSanPham'],$row['TenSanPham'],$row['MoTaSanPham'],
                $row['GiaSanPham'],$row['AnhSanPham'],$row['ThuocTinh'],$BinhChon);
            $ListSanPham[]=$SanPham;
        }
        mysql_close();
        return $ListSanPham;
    }


    public function LaySoLuongSanPham(){
        $sql="select count(*) from sanpham";
        $kq=mysql_query($sql);
        $row=mysql_fetch_array($kq);
        return $row[0];
    }
}
?>