<div class="col-md-9">
    <div class="checkout-page steps active">
        <ol class="checkout-steps">
            <li class="steps active">
                <a href="#" class="step-title">
                    Thông tin cá nhân
                </a>
                <div class="step-description">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <div class="run-customer">
                                <h5>

                                </h5>
                                <form method="POST">
                                    <input type="hidden" name="controller" value="thongtincanhan">
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Tên đăng nhập
                                        </label>
                                        <input type="text" value="<?php echo $ThongTinCaNhan->TenDangNhap;?>" class="input namefild" disabled>
                                    </div>

                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Địa chỉ
                                        </label>
                                        <input type="text" class="input namefild" value="<?php echo $ThongTinCaNhan->DiaChi;?>" name="DiaChi">
                                    </div>

                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Số điện thoại
                                        </label>
                                        <input type="text" class="input namefild" value="<?php echo $ThongTinCaNhan->SDT;?>" name="SDT">
                                    </div>

                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Vai trò
                                        </label>
                                        <input type="text" class="input namefild" value="Khách hàng" disabled>
                                    </div>
                                    <p class="forgoten">
                                        <a href="#">
                                        </a>
                                    </p>
                                    <button name="action" value="update">
                                        Cập nhật thông tin cá nhân
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <?php
                            include_once("view/ThongTinCaNhan_ThongBao.php");
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        </ol>
    </div>
</div>