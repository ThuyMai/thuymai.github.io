<?php
include_once("model/Model_PhanHoi.php");
class Controller_PhanHoi{
    public $model;
    function __construct(){
        $this->model=new Model_PhanHoi();
    }
    function GuiPhanHoi($HoVaTen,$Email,$NoiDung){
        $kq=$this->model->GuiPhanHoi($HoVaTen,$Email,$NoiDung);
        //echo "ket qua: ".$kq;
        $_SESSION['kqPhanHoi']=($kq>0?1:0);
        include "view/View_LienHe.php";
    }
}
?>