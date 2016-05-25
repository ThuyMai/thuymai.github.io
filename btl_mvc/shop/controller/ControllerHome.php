<?php
if(!isset($_POST['controller'])){
    if(isset($_SESSION['TrangHoaDon'])){
        include_once("controller/Controller_ThongTinGioHang.php");
        $ThongTinGioHang=new Controller_ThongTinGioHang();
        $ThongTinGioHang->LayGioHangChiTiet($_SESSION['user']);
        unset($_SESSION['TrangHoaDon']);
    }else {
        HienSanPham();
    }
}else{
    switch ($_POST['controller']) {
        case 'themgiohang':
            include_once("controller/Controller_ThemGioHang.php");
            $ThemGioHang = new Controller_ThemGioHang();
            $ThemGioHang->ThemGioHang();
            header("Location:index.php");
            break;
        case 'xoagiohang':
            include_once("controller/Controller_XoaGioHang.php");
            $XoaGioHang = new Controller_XoaGioHang();
            $XoaGioHang->XoaGioHang();
            header("Location:index.php");
            break;

        case 'xoagiohangchitiet':
            include_once("controller/Controller_XoaGioHang.php");
            $XoaGioHang = new Controller_XoaGioHang();
            $XoaGioHang->XoaGioHang();
            $_SESSION['TrangHoaDon'] = 't';
            header("Location:index.php");
            break;
        case 'binhchon':
            include_once("controller/Controller_BinhChon.php");
            $BinhChon = new Controller_BinhChon();
            if ($_POST['action'] == 'like') {
                $BinhChon->ThemBinhLuan();
            } else {
                $BinhChon->XoaBinhLuan();
            }
            header("Location:index.php");
            break;
        case 'chitietsanpham':
            include_once("controller/Controller_ChiTietSanPham.php");
            $ChiTietSanPham = new Controller_ChiTietSanPham();
            $ChiTietSanPham->ChiTietSanPham($_POST['idSanPham']);
            break;
        case 'chitietgiohang':
            include_once("controller/Controller_ThongTinGioHang.php");
            $ThongTinGioHang = new Controller_ThongTinGioHang();
            $ThongTinGioHang->LayGioHangChiTiet($_SESSION['user']);
            break;
        case 'logout':
            unset($_SESSION['user']);
            header("Location:view/login.php");
            break;
        case 'home':
        case 'page':
            if (isset($_POST['p'])) {
                if ($_POST['p'] != -1 && $_POST['p'] != -2) {
                    $_SESSION['page'] = $_POST['p'];
                } else {
                    $PageCurrent = isset($_SESSION['page']) ? $_SESSION['page'] : 1;
                    include_once "model/Model_CacSanPham.php";
                    $model = new Model_CacSanPham();
                    $SoLuongTrang = $_SESSION['SoLuongTrang'];

                    if ($_POST['p'] == -1) {
                        if ($PageCurrent + 1 > $SoLuongTrang) {
                            $PageCurrent = 1;
                        } else {
                            $PageCurrent = $PageCurrent + 1;
                        }
                    } else {
                        if ($PageCurrent - 1 < 1) {
                            $PageCurrent = $SoLuongTrang;
                        } else {
                            $PageCurrent = $PageCurrent - 1;
                        }
                    }
                    $_SESSION['page'] = $PageCurrent;
                }
            }
            HienSanPham();
            break;
        case 'vechungtoi':
            include "view/View_VeChungToi.php";
            break;
        case 'huongdanmuahang':
            include "view/View_HuongDanMuaHang.php";
            break;
        case 'lienhe':
            include "view/View_LienHe.php";
            break;
        case 'thongtincanhan':
            include "view/View_ThongTinCaNhanHome.php";
            break;
        case 'timkiem':
            include "controller/Controller_CacSanPham.php";
            $CacSanPham = new Cotroller_CacSanPham();
            $CacSanPham->TimKiem($_POST['search']);
            break;
        case 'phanhoi':
            include "controller/Controller_PhanHoi.php";
            $PhanHoi = new Controller_PhanHoi();
            $PhanHoi->GuiPhanHoi($_POST['HoVaTen'], $_POST['Email'], $_POST['NoiDung']);
            header("Location:index.php");
            break;
    }
}
function HienSanPham()
{
    include "controller/Controller_CacSanPham.php";
    $CacSanPham = new Cotroller_CacSanPham();
    $page = isset($_SESSION['page']) ? $_SESSION['page'] : 1;
    $CacSanPham->LayTatCaSanPham(isset($_SESSION['user']) ? $_SESSION['user'] : '', $page);

}
?>