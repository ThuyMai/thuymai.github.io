<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="logo"><a href="index.php"><img src="images/logo.png" alt="FlatShop"></a></div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="header_top">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-12">
                            <?php
                            if(isset($_SESSION['user'])){
                                echo '<ul class="usermenu">
                                         <li>
                                            <form id="fr_ThongTinCN" method="post">
                                                <input type="hidden" name="controller" value="thongtincanhan">
                                                <a href="#" class="log" onclick="document.getElementById(\'fr_ThongTinCN\').submit();">Xin chào ' .$_SESSION['user'].'!</a>
                                            </form>
                                         </li>
                                         <li>
                                            <form id="fr_logout" method="post">
                                                <input type="hidden" name="controller" value="logout">
                                                <a href="#" class="out" onclick="document.getElementById(\'fr_logout\').submit();">Đăng xuất</a>
                                            </form>
                                         </li>
                                      </ul>';
                            }else{
                                echo '<ul class="usermenu">
                                             <li><a href="view/login.php" class="log">Login</a></li>
                                             <li><a href="view/register.php" class="reg">Register</a></li>
                                          </ul>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="header_bottom">
                    <ul class="option">
                        <li id="search" class="search">
                            <form method="post">
                                <input type="hidden" name="p" value="0"/>
                                <input type="hidden" name="controller" value="timkiem"/>
                                <input class="search-submit" type="submit" value="">
                                <input class="search-input" placeholder="Nhập từ khóa tìm kiếm..." type="text" value="" name="search">
                            </form>
                        </li>
                        <?php
                            if(isset($_SESSION['user'])){
                                include "controller/Controller_ThongTinGioHang.php";
                                $ThongTinGioHang=new Controller_ThongTinGioHang();
                                $ThongTinGioHang->LayGioHang($_SESSION['user']);
                            }
                        ?>
                    </ul>
                    <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <form id='fr_home' method="post">
                                    <input type="hidden" name="controller" value="home">
                                    <a href="#" onclick="document.getElementById('fr_home').submit();">Home</a>
                                </form>
                            </li>
                            <li>
                                <form id='fr_vechungtoi' method="post">
                                    <input type="hidden" name="controller" value="vechungtoi">
                                    <a href="#" onclick="document.getElementById('fr_vechungtoi').submit();">Về chúng tôi</a>
                                </form>
                            </li>
                            <li>
                                <form id='fr_huongdan' method="post">
                                    <input type="hidden" name="controller" value="huongdanmuahang">
                                    <a href="#" onclick="document.getElementById('fr_huongdan').submit();">Hướng dẫn mua hàng</a>
                                </form>
                            </li>
                            <li>
                                <form id='fr_lienhe'method="post">
                                    <input type="hidden" name="controller" value="lienhe">
                                    <a href="#" onclick="document.getElementById('fr_lienhe').submit();">Liên hệ</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
