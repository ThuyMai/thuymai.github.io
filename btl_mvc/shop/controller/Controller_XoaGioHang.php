<?php
include_once("model/Model_XoaGioHang.php");
class Controller_XoaGioHang{
    public $model;
    function __construct(){
        $this->model=new Model_XoaGioHang();
    }
    function XoaGioHang(){
        $_SESSION['kqXoaGioHang']=$this->model->XoaGioHang();
    }
}
?>