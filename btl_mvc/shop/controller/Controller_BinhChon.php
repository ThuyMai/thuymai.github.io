<?php
include_once("model/Model_BinhChon.php");
class Controller_BinhChon{
    public $model;
    function __construct(){
        $this->model=new Model_BinhChon();
    }
    function ThemBinhLuan(){
        if(isset($_SESSION['user'])){
            $_SESSION['kqThemBinhChon']=$this->model->ThemBinhChon($_SESSION['user'],$_POST['idSanPham']);
        }else{
            $_SESSION['kqThemBinhChon']=-1;
        }
    }
    function XoaBinhLuan(){
        if(isset($_SESSION['user'])){
            $_SESSION['kqXoaBinhChon']=$this->model->XoaBinhChon($_SESSION['user'],$_POST['idSanPham']);
        }else{
            $_SESSION['kqXoaBinhChon']=-1;
        }
    }
}
?>