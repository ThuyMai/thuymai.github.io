<?php
    session_start();
    if(isset($_POST['tendangnhap'])&&isset($_POST['matkhau'])){
        include "model/connect.php";
        $sql='select * from ThanhVien where TenDangNhap="'.$_POST['tendangnhap'].'" and MatKhau="'.MD5($_POST['matkhau']).'"';
        $kq=mysql_query($sql);
        $row=mysql_num_rows($kq);
        if($row==1){
            $row=mysql_fetch_array($kq);
            echo $row['Quyen'];
            if($row['Quyen']==1){
                $_SESSION['useradmin']=$_POST['tendangnhap'];
                header("Location:index.php");
            }else{
                echo '<script language="javascript">';
                echo 'alert("Lỗi! Tài khoản không được quyền truy cập")';
                echo '</script>';
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Đăng nhập thất bại")';
            echo '</script>';
        }
    }
    if(isset($_GET['cmd'])){
        //session_destroy();
        unset($_SESSION['useradmin']);
        header("Location:login.php");
    }
?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../shop/css/bootstrap.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../shop/css/style.css" rel="stylesheet">
	</head>
	<body style="background:url(anh/bg_login.jpg) no-repeat center 0;background-size: 88%;">
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" style="opacity: 0.9">
      <div class="modal-header">
          <h1 class="text-center">Login admin</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
              <input type="text" name="tendangnhap" class="form-control input-lg" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
              <input type="password" name="matkhau" class="form-control input-lg" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="../shop/js/bootstrap.min.js"></script>
	</body>
</html>

