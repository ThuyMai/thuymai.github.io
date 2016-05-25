<?php
include_once "model/Model_ThongTinCaNhan.php";
class Controller_ThongTinCaNhan_TTGD_ChiTiet{
    public $model;
    function __construct(){
        mysql_close();
        $this->model=new Model_ThongTinCaNhan();
    }
    function HoaDonChiTiet($user,$idHoaDon){
        $ListSanPham=$this->model->HoaDonChiTiet($user,$idHoaDon);
        include "view/View_ThongTinCaNhan_TTDG_ChiTiet.php";
    }
}
?>