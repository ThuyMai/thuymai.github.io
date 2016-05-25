<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.bootstrap-growl.js"></script>
<?php
//thông báo thêm sản phẩm vào giỏ hàng
if(isset($_SESSION['kqThemGioHang'])){
    if($_SESSION['kqThemGioHang']==1){
        ThongBao("Thành công! Bạn đã thêm sản phẩm vào giỏ hàng thành công",'info');
    }else if($_SESSION['kqThemGioHang']==0){
        ThongBao("Lỗi! Bạn chưa thêm được sản phẩm vào giỏ hàng",'danger');
    }else{
        ThongBao("Lỗi! Bạn cần đăng nhập để sử dụng chức năng này",'danger');
    }
    unset($_SESSION['kqThemGioHang']);
}
//thông báo xóa sản phẩm khỏi giỏ hàng
if(isset($_SESSION['kqXoaGioHang'])){
    if($_SESSION['kqXoaGioHang']==1){
        ThongBao("Thành công! Bạn đã xóa sản phẩm trong giỏ hàng thành công",'info');
    }else{
        ThongBao("Lỗi! Bạn phải chưa xóa được sản phẩm trong giỏ hàng",'danger');
    }
    unset($_SESSION['kqXoaGioHang']);
}
//thông báo vote sản phẩm
if(isset($_SESSION['kqThemBinhChon'])){
    if($_SESSION['kqThemBinhChon']==1){
        ThongBao("Thành công! Cảm ơn bạn đã vote sản phẩm",'info');
    }else if($_SESSION['kqThemBinhChon']==0){
        ThongBao("Lỗi! Bạn chưa vote được sản phẩm",'danger');
    }else{
        ThongBao("Lỗi! Bạn cần đăng nhập để sử dụng chức năng này",'danger');
    }
    unset($_SESSION['kqThemBinhChon']);
}
if(isset($_SESSION['kqXoaBinhChon'])){
    if($_SESSION['kqXoaBinhChon']==1){
        ThongBao("Thành công! Bạn đã bỏ vote sản phẩm thành công",'info');
    }else if($_SESSION['kqXoaBinhChon']==0){
        ThongBao("Lỗi! Bạn chưa bỏ được vote sản phẩm",'danger');
    }else{
        ThongBao("Lỗi! Bạn cần đăng nhập để sử dụng chức năng này",'danger');
    }
    unset($_SESSION['kqXoaBinhChon']);
}
if(isset($_SESSION['kqPhanHoi'])){
    if($_SESSION['kqPhanHoi']==1){
        ThongBao("Thành công! Cảm ơn bạn đã gửi phản hồi về cho chúng tôi","info");
    }else{
        ThongBao("Lỗi! phản hồi của bạn chưa được gửi","danger");
    }
    unset($_SESSION['kqPhanHoi']);
}
function ThongBao($message,$type){
    echo '<script type="text/javascript">
         $(function() {
            $.bootstrapGrowl("'.$message.'", {
                type: \''.$type.'\'
            });
        });
      </script>';
}
?>