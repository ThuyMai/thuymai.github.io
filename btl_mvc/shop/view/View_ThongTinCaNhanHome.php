<div class="container_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="special-deal leftbar" style="margin-top:0;">
                    <h4 class="title">
                        Khách hàng <strong><?php echo $_SESSION['user'];?></strong>
                    </h4>
                    <div class="special-item">
                        <form method="post">
                            <input type="hidden" name="controller" value="thongtincanhan">
                            <button style="width: 230px;text-align:left" value="action" name="TTCN">
                                Thông tin cá nhân
                            </button>
                        </form>
                    </div>
                    <div class="special-item">
                        <form method="post">
                            <input type="hidden" name="controller" value="thongtincanhan">
                            <button style="width: 230px;text-align:left" name="action" value="TTGD">
                                Thông tin giao dịch
                            </button>
                        </form>
                    </div>
                    <div class="special-item">
                        <form method="post">
                            <input type="hidden" name="controller" value="thongtincanhan">
                            <button style="width: 230px;text-align:left" name="action" value="DMK">
                                Đổi mật khẩu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- nội dung trang thông tin cá nhân -->
            <?php
                include "controller/ControllerTTCN.php";
            ?>
        </div>
        <div class="clearfix">
        </div>

    </div>
</div>