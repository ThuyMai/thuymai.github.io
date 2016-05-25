<?php
    session_start();
    include "connect.php";
    if(isset($_POST['edit'])){
        $mk=$_POST['MatKhau1']!=$_POST['MatKhau2']?MD5($_POST['MatKhau2']):$_POST['MatKhau1'];
        $sql='UPDATE ThanhVien set MatKhau="'.$mk.'",Quyen='.$_POST['Quyen'].' WHERE idThanhVien='.$_POST['idThanhVien'];
        $kq=mysql_query($sql);
        //echo $sql;
        if($kq){
            $_SESSION['kqed']='t';
            header("Location:../index.php?cmd=danhsachnguoidung");
        }else{
            $_SESSION['kqed']='f';
            header("Location:../index.php?cmd=danhsachnguoidung");
        }
    }
    if(isset($_POST['delete'])){
        $sql="DELETE FROM ThanhVien WHERE idThanhVien=".$_POST['idThanhVien'];
        $kq=mysql_query($sql);
        if($kq){
            $_SESSION['kqdl']='t';
            header("Location:../index.php?cmd=danhsachnguoidung");
        }else{
            $_SESSION['kqdl']='f';
            header("Location:../index.php?cmd=danhsachnguoidung");
        }
    }
?>