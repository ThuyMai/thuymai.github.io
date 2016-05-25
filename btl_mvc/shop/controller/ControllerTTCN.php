<?php
if(isset($_POST['action'])){
    include_once("controller/Controller_ThongTinCaNhan.php");
    $ThongTinCaNhan=new Controller_ThongTinCaNhan();
    switch ($_POST['action']){
        case 'TTCN':    //hiển thị form thông tin cá nhân
            $ThongTinCaNhan->LayThongTinCaNhan($_SESSION['user']);
            break;
        case 'update':  //thực hiện cập nhật thông tin cá nhân
            $ThongTinCaNhan->CapNhatThongTinCaNhan($_POST['DiaChi'],$_POST['SDT'],$_SESSION['user']);
            break;
        case 'TTGD':    //hiển thị form thông tin giao dịch
            $ThongTinCaNhan->ThongTinGiaoDich($_SESSION['user']);
            break;
        case 'DMK':     //hiển thị form đổi mật khẩu
            include "view/View_ThongTinCaNhan_DoiMatKhau.php";
            break;
        case 'doimatkhau':
            $ThongTinCaNhan->DoiMatKhau($_POST['MatKhau1'],$_POST['MatKhau2'],$_POST['MatKhauCu'],$_SESSION['user']);
            break;

    }
}else{
    include_once("controller/Controller_ThongTinCaNhan.php");
    $ThongTinCaNhan=new Controller_ThongTinCaNhan();
    $ThongTinCaNhan->LayThongTinCaNhan($_SESSION['user']);
}
?>