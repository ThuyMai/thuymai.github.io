<?php
    session_start();
    include "connect.php";
    if(isset($_POST['edit'])){
        $sql='UPDATE SanPham set TenSanPham="'.$_POST['TenSanPham'].'",MoTaSanPham="'.mysql_real_escape_string($_POST['mota']).'",GiaSanPham="';
        $sql.=$_POST['GiaSanPham'].'",ThuocTinh="'.$_POST['ThuocTinh'].'" where idSanPham='.$_POST['idSanPham'];
        //echo $_POST['mota'];
        $kq=mysql_query($sql);
        if($kq){
            $_SESSION['kqedsp']=1;
            header("Location:../index.php?cmd=danhsachsanpham");
        }else{
            $_SESSION['kqedsp']=0;
            header("Location:../index.php?cmd=danhsachsanpham");
        }
    }else if(isset($_POST['delete'])){
        $sql='DELETE from SanPham where idSanPham='.$_POST['idSanPham'];
        $kq=mysql_query($sql);
        echo $sql;
        if($kq){
            $_SESSION['kqde']=1;
            header("Location:../index.php?cmd=danhsachsanpham");
        }else{
            $_SESSION['kqde']=0;
            ("Location:../index.php?cmd=danhsachsanpham");
        }
    }
?>