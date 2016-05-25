<?php
if(isset($_SESSION['kqCapNhatThongTinCaNhan'])){
    if($_SESSION['kqCapNhatThongTinCaNhan']==0){
        echo '<div class="alert alert-danger">
            <strong>Lỗi!</strong> Thông tin cá nhân chưa được cập nhật.
          </div>';
    }else{
        echo '<div class="alert alert-success">
            <strong>Thành công!</strong> Thông tin cá nhân đã được cập nhật.
        </div>';
    }
    unset($_SESSION['kqCapNhatThongTinCaNhan']);
}
if(isset($_SESSION['kqDoiMatKhau'])){
    if($_SESSION['kqDoiMatKhau']==1){
        echo '<div class="alert alert-success">
            <strong>Thành công!</strong> Mật khẩu cá nhân đã được cập nhật.
        </div>';
    }else{
        if($_SESSION['kqDoiMatKhau']==0){
            $Loi='Mật khẩu các nhân chưa được cập nhật';
        }else if($_SESSION['kqDoiMatKhau']==-1){
            $Loi='Hai mật khẩu không trùng nhau';
        }else if($_SESSION['kqDoiMatKhau']==-2){
            $Loi='Mật khẩu hiện tại không dúng';
        }
        echo '<div class="alert alert-danger">
                 <strong>Lỗi!</strong> '.$Loi.'.
              </div>';
    }
    unset($_SESSION['kqDoiMatKhau']);
}
?>