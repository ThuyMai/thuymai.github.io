<?php
include_once("model/Model_ChiTietSanPham.php");
class Controller_ChiTietSanPham{
    public $model;
    function __construct(){
        $this->model=new Model_ChiTietSanPham();
    }
    function ChiTietSanPham($idSanPham){
        $SanPham=$this->model->ChiTietSanPham($idSanPham);
        include_once("view/View_ChiTietSanPham.php");
    }
}
?>