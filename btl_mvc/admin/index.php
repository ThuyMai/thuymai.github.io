<?php
  session_start();
  if(!isset($_SESSION['useradmin'])){
    header("Location:login.php");
  }
  if(isset($_SESSION['kqdl'])){
    if($_SESSION['kqdl']=='t'){
      echo '<script language="javascript">';
      echo 'alert("Bạn đã xóa thành viên thành công");';
      echo '</script>';
    }else{
      echo '<script language="javascript">';
      echo 'alert("Bạn chưa xóa được thành viên");';
      echo '</script>';
    }
    unset($_SESSION['kqdl']);
    //header("Location:index.php?cmd=danhsachnguoidung");
  }
  if(isset($_SESSION['kqed'])){
    if($_SESSION['kqed']=='t'){
      echo '<script language="javascript">';
      echo 'alert("Bạn đã sửa thành viên thành công");';
      echo '</script>';
    }else{
      echo '<script language="javascript">';
      echo 'alert("Bạn chưa sửa được thành viên");';
      echo '</script>';
    }
    unset($_SESSION['kqed']);
    //header("Location:index.php?cmd=danhsachnguoidung");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản trị hệ thống</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="shortcut icon" href="../shop/images/favicon.png">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .text1 {
        display: inline-block;
        margin-top: 15px;
        color: white;
        font-size: 25px;
        text-transform: uppercase;
      }​
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="index.php" class="logo" style="position: fixed;">
          <span class="logo-mini">SHOP</span>
          <span class="logo-lg">QUẢN TRỊ SHOP</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div style=" padding:0px;">
            <marquee direction="left" style="padding:0px; height:50px;width: 90%; marging:0px;">
              <span class="text1">CHÀO MỪNG </span>
              <span class="text1" style="color: red"><?php echo $_SESSION['useradmin']; ?></span>
              <span class="text1">ĐẾN TRANG QUẢN TRỊ HỆ THỐNG TU MAI FLAT SHOP!</span>
            </marquee></div>
        </nav>

      </header>
      <aside class="main-sidebar" style="position: fixed;">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">

              <a target="_blank" href="../shop/index.php">
                <img src="dist/img/avatar.png" alt="User Image" width="45" height="45">
              </a>
            </div>
            <div class="pull-left info">
              <p style="text-transform: uppercase"><?php echo $_SESSION['useradmin']?></p>
              <a href="login.php?cmd=logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">GÓC QUẢN TRỊ</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-futbol-o"></i>
                <span>Quản trị sản phẩm</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?cmd=themsanpham"><i class="fa fa-plus-square"></i>Thêm sản phẩm</a></li>
                <li><a href="index.php?cmd=danhsachsanpham"><i class="fa fa-list"></i>Danh sách sản phẩm</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Quản trị bán hàng</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?cmd=danhsachhoadon"><i class="fa fa-barcode"></i>Các hóa đơn</a></li>
                <li><a href="index.php?cmd=baocaobanhang"><i class="fa fa-line-chart"></i> Báo cáo bán hàng</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Quản trị người dùng</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?cmd=danhsachnguoidung"><i class="fa fa-users"></i>Danh sách người dùng</a></li>
                <li><a href="index.php?cmd=phanhoi"><i class="fa fa-comments"></i>Phản hồi khách hàng</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <section class="content">
          <?php
            if(isset($_GET['cmd'])){
              $cmd=$_GET['cmd'];
              switch($cmd){
                case 'themsanpham':
                  include "include/ThemSanPham.php";
                  break;
                case 'danhsachsanpham':
                  include "include/DanhSanPham.php";
                  break;
                case 'danhsachnguoidung':
                  include "include/QuanTriNguoiDung.php";
                  break;
                case 'danhsachhoadon':
                  include "include/DanhSachHoaDon.php";
                  break;
                case 'baocaobanhang':
                  include "include/BaoCaoBanHang.php";
                  break;
                case 'phanhoi':
                  include 'include/PhanHoi.php';
                  break;
              }
            }else{
                  include "include/DanhSanPham.php";
            }
          ?>
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a target="_blank" href="https://www.facebook.com/quytutlu">Quy Tu and Thuy Mai</a>.</strong> All rights reserved.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
