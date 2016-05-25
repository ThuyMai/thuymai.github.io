<?php
    session_start();
    if(isset($_POST['tendangnhap'])){
        if($_POST['matkhau1']!=$_POST['matkhau2']){
            $_SESSION['error']='Hai mật khẩu không trùng nhau!';
            header("Location:register.php");
        }else{
            include "../model/connect.php";
            $sql='SELECT * from ThanhVien WHERE TenDangNhap="'.$_POST['tendangnhap'].'"';
            $kq=mysql_query($sql);
            //echo $sql;
            if(mysql_num_rows($kq)==1){
                $_SESSION['error']='Tên đăng nhập đã tồn tại!';
                header("Location:register.php");
            }else{
                $sql='INSERT INTO ThanhVien(TenDangNhap,MatKhau,SDT,DiaChi,Quyen) values("'.$_POST['tendangnhap'].'","'.MD5($_POST['matkhau1']).'","'.$_POST['sdt'].'","'.$_POST['diachi'].'",2)';
                $kq=mysql_query($sql);
                echo $kq;
                if($kq){
                    header("Location:login.php");
                }else{
                    $_SESSION['error']='Tài khoản chưa được đăng ký!';
                    //header("Location:register.php");
                }
            }
        }
    }else{
        if(isset($_SESSION['error'])){
            echo '<script language="javascript">';
            echo 'alert("Lỗi! '.$_SESSION['error'].'")';
            echo '</script>';
            unset($_SESSION['error']);
        }
    }
?>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Đăng ký thành viên</title>
    <link rel="shortcut icon" href="../images/favicon.png">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body style="background:url(../images/bg_login.jpg) no-repeat center 0;background-size: 88%;">
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="opacity: 0.9">
            <div class="modal-header">
                <h1 class="text-center">Register</h1>
            </div>
            <div class="modal-body">
                <form class="form col-md-12 center-block" method="post">
                    <div class="form-group">
                        <input type="text" name="tendangnhap" class="form-control input-lg" placeholder="Tên đăng nhập">
                    </div>
                    <div class="form-group">
                        <input type="password" id="mk1" name="matkhau1" class="form-control input-lg" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <input type="password" id="mk2" name="matkhau2" class="form-control input-lg" placeholder="Gõ lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sdt"  class="form-control input-lg" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="text" name="diachi" class="form-control input-lg" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block">Đăng ký</button>
                    </div>
                    <p><a href="../index.php">Trở về trang chủ</a></p>
                    <p><a href="login.php">Đăng nhập</a></p>
                </form>

            </div>
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>