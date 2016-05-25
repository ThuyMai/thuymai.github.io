<div class="col-md-9">
    <div class="checkout-page steps active">
        <ol class="checkout-steps">
            <li class="steps active">
                <a href="#" class="step-title">
                    Đổi mật khẩu
                </a>
                <div class="step-description">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <div class="run-customer">
                                <h5>

                                </h5>
                                <form action="" method="post">
                                    <input type="hidden" name="controller" value="thongtincanhan">
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Mật khẩu cũ
                                        </label>
                                        <input type="password" class="input namefild" name="MatKhauCu">
                                    </div>

                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Mật khẩu mới
                                        </label>
                                        <input type="password" class="input namefild" name="MatKhau1">
                                    </div>

                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Xác nhận mk
                                        </label>
                                        <input type="password" class="input namefild" name="MatKhau2">
                                    </div>
                                    <p class="forgoten">
                                        <a href="#">
                                        </a>
                                    </p>
                                    <button name="action" value="doimatkhau">
                                        Đổi mật khẩu
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <?php
                            include "view/ThongTinCaNhan_ThongBao.php";
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        </ol>
    </div>
</div>