<div class="footer">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="title">Thông tin <strong>liên lạc</strong></h4>
                    <p>Nghiêm Xuân Yêm, phường Đại Kim, Quận Hoàng Mai, Hà Nội </p>
                    <p>Số điện thoại 1 : 01688558810</p>
                    <p>Số điện thoại 2 : 01653272738</p>
                    <p>Email 1 : quytutlu@gmail.com</p>
                    <p>Email 2 : thuymaitlu@gmail.com</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="title">Hỗ trợ<strong> khách hàng</strong></h4>
                    <ul class="support">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Phương thức thanh toán</a></li>
                        <li><a href="#">Đặt hàng online</a></li>
                        <li><a href="#">Thông tin khác</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="title">Nhận bản tin <strong>cửa hàng </strong></h4>
                    <p>Đăng ký nhận bản tin.</p>
                    <form class="newsletter">
                        <input type="text" name="" placeholder="Nhập email của bạn....">
                        <input type="submit" value="Đăng ký" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright © 2015-2016. Designed by <a href="#">Quy Tu and Thuy Mai</a>. All rights reseved</p>
                </div>
                <div class="col-md-6">
                    <ul class="social-icon">
                        <li><a href="#" class="linkedin"></a></li>
                        <li><a href="#" class="google-plus"></a></li>
                        <li><a href="https://twitter.com/TuNguyenQuy" target="_blank" class="twitter"></a></li>
                        <li><a href="https://www.facebook.com/quytutlu" target="_blank" class="facebook"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<style type='text/css'>
    .bttop{
        background:url('images/up.png');
        height: 48px;
        width: 68px;
        text-align:center;
        padding:5px;
        position:fixed;
        bottom:35px;
        right:10px;
        cursor:pointer;
        display:none;
        color:#fff;
        font-size:11px;
        font-weight:900;
    }
</style>
<div class='bttop'></div>
<script src='js/jquery-1.10.2.min.js' type='text/javascript'></script>
<script type='text/javascript'>
    $(function(){
        $(window).scroll(
            function() {
                if($(this).scrollTop()!=0){
                    $('.bttop').fadeIn();
                }else {
                    $('.bttop').fadeOut();
                }
            });
        $('.bttop').click(function() {
            $('body,html').animate({scrollTop:0},1000);
        });
    });
</script>