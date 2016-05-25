<?php
include_once("model/Model_ThongTinCaNhan.php");
class Controller_ThongTinCaNhan{
    public $model;
    function __construct(){
        $this->model=new Model_ThongTinCaNhan();
    }
    function LayThongTinCaNhan($user){
        $ThongTinCaNhan=$this->model->LayThongTinCaNhan($user);
        include "view/View_ThongTinCaNhan_TTCN.php";
    }
    function DoiMatKhau($MatKhau1,$MatKhau2,$MatKhauCu,$User){
        $kq=$this->model->DoiMatKhau($MatKhau1,$MatKhau2,$MatKhauCu,$User);
        $_SESSION['kqDoiMatKhau']=$kq;
        include "view/View_ThongTinCaNhan_DoiMatKhau.php";
    }
    function CapNhatThongTinCaNhan($DiaChi,$SDT,$User){
        $kq=$this->model->CapNhatThongTinCaNhan($DiaChi,$SDT,$User);
        $_SESSION['kqCapNhatThongTinCaNhan']=$kq;
        $this->LayThongTinCaNhan($_SESSION['user']);
    }
    function ThongTinGiaoDich($user){
        $ListNgayThanhToan=$this->model->ThongTinGiaoDich($user);
        $idHoaDon=isset($_POST['idHoaDon'])?$_POST['idHoaDon']:0;
        include "view/View_ThongTinCaNhan_TTGD.php";
    }
}
?>