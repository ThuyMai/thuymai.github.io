<?php
class Model_ThemGioHang{
    function __construct(){
        include "model/connect.php";
    }
    public function ThemGioHang(){
        if(!isset($_SESSION['user'])){
            return -1;
        }else{
            if($_POST['sl']){
                $sql='Call ThemGioHang('.$_POST['idSanPham'].','.$_POST['sl'].',"'.$_SESSION['user'].'")';
                $kq= mysql_query($sql);
                mysql_close();
                return $kq;
            }
        }

    }
}
?>