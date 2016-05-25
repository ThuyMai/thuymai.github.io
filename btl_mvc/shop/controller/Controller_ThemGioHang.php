<?php
include_once("model/Model_ThemGioHang.php");
class Controller_ThemGioHang{
    public $model;
    function __construct(){
        $this->model=new Model_ThemGioHang();
    }
    public function ThemGioHang(){
        $kq=$this->model->ThemGioHang();
        $_SESSION['kqThemGioHang']=$kq;
    }
}
?>