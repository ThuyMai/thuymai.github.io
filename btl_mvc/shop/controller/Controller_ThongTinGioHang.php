<?php
include_once("model/Model_ThongTinGioHang.php");
class Controller_ThongTinGioHang{
    public $model;
    public function __construct(){
        $this->model=new Model_ThongTinGioHang();
    }
    public function LayGioHang($Username){
        $ListItemGioHang=$this->model->LayGioHang($Username);
        include_once "view/View_ThongTinGioHang.php";
    }
    public function LayGioHangChiTiet($Username){
        $ListItemGioHang=$this->model->LayGioHang($Username);
        include_once "view/View_ChiTietGioHang.php";
    }
}
?>