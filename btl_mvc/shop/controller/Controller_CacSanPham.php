<?php
include_once("model/Model_CacSanPham.php");
class Cotroller_CacSanPham{
    public $Model;
    public function __construct(){
        $this->Model=new Model_CacSanPham();
    }
    public function LayTatCaSanPham($user,$p){
        $TatCaSanPham= $this->Model->LayTatCaSanPham($user,$p);
        $this->Model=new Model_CacSanPham();
        $sl=$this->Model->LaySoLuongSanPham();
        include "view/View_CacSanPham.php";
    }
    public function TimKiem($TuKhoa){
        $TatCaSanPham= $this->Model->TimKiem($TuKhoa);
        $sl=count($TatCaSanPham);
        include "view/View_CacSanPham.php";
    }
}
?>