<?php
include_once("model/ob_User.php");
include_once("model/ob_HoaDon.php");
class Model_ThongTinCaNhan{
    function __construct(){
        include "model/connect.php";
    }
    function LayThongTinCaNhan($user){
        $sql='SELECT * FROM thanhvien WHERE TenDangNhap="'.$user.'"';
        $kq=mysql_query($sql);
        $row=mysql_fetch_array($kq);
        $User=new ob_User($row['idThanhVien'],$row['TenDangNhap'],$row['MatKhau'],$row['SDT'],
            $row['DiaChi'],$row['Quyen']);
        return $User;
    }

    function DoiMatKhau($MatKhau1,$MatKhau2,$MatKhauCu,$User){
        if($MatKhau1!=$MatKhau2){
            return -1;
        }else{
            $sql='SELECT * FROM ThanhVien WHERE TenDangNhap="'.$User.'" AND MatKhau="'.MD5($MatKhauCu).'"';
            $kq=mysql_query($sql);
            if(mysql_num_rows($kq)==1){
                $sql='UPDATE ThanhVien SET MatKhau="'.MD5($MatKhau1).'" WHERE TenDangNhap="'.$User.'"';
                $kq=mysql_query($sql);
                return $kq;
            }else{
                return -2;
            }
        }
    }


    function CapNhatThongTinCaNhan($DiaChi,$SDT,$User){
        $sql='UPDATE ThanhVien SET DiaChi="'.$DiaChi.'", SDT="'.$SDT.'" WHERE TenDangNhap="'.$User.'"';
        $kq=mysql_query($sql);
        return $kq;
    }

    function ThongTinGiaoDich($user){
        $sql='CALL LayDanhSachHoaDonKhachHang("'.$user.'")';
        $kq=mysql_query($sql);
        $ListNgayThanhToan=array();
        while($row=mysql_fetch_array($kq)){
            $ListNgayThanhToan[]=$row['NgayThanhToan'];
        }
        return $ListNgayThanhToan;
    }

    function HoaDonChiTiet($user,$idHoaDon){
        $sql='Call LayThongTinHoaDonKhachHang("' . $user . '","'.$idHoaDon.'")';
        $kq=mysql_query($sql);
        $ListSanPham=array();
        while($row=mysql_fetch_array($kq)){
            $HoaDon=new ob_HoaDon($row['idSanPham'],$row['TenSanPham'],$row['MoTaSanPham'],
                $row['GiaSanPham'],$row['AnhSanPham'],$row['ThuocTinh'],$row['SoLuong']);
            $ListSanPham[]=$HoaDon;
        }
        return $ListSanPham;
    }
}
?>