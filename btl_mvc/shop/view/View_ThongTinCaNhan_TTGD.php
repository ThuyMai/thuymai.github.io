<div class="col-md-9">
    <div class="checkout-page steps active">
        <ol class="checkout-steps">
            <li class="steps active">
                <a href="#" class="step-title">
                    Thông tin giao dịch
                </a>
                <div class="step-description">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="run-customer">
                                <div class="sort-by">
                                    <form method="post">
                                        Chọn hóa đơn :
                                        <input type="hidden" name="controller" value="thongtincanhan">
                                        <input type="hidden" name="action" value="TTGD">
                                        <select name="idHoaDon" onchange="this.form.submit();">
                                            <?php
                                            $Tong=0;
                                            if($idHoaDon!=0){
                                                echo '<option value="avc">
                                                        '.$idHoaDon.'
                                                        </option>';
                                            }else{
                                                echo '<option value="">
                                                            Chọn hóa đơn
                                                        </option>';
                                            }
                                            foreach($ListNgayThanhToan as $HoaDon){
                                                echo '<option value="'.$HoaDon.'">
                                                            '.$HoaDon.'
                                                        </option>';
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <?php
                                if(isset($_POST['idHoaDon'])){
                                    include "controller/Controller_ThongTinCaNhan_TTGD_ChiTiet.php";
                                    $TTDG_ChiTiet=new Controller_ThongTinCaNhan_TTGD_ChiTiet();
                                    $TTDG_ChiTiet->HoaDonChiTiet($_SESSION['user'],$_POST['idHoaDon']);
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        </ol>
    </div>
</div>