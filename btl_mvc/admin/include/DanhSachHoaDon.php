<div class="form-horizontal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            <h4 class="modal-title">
                <?php
                    if(!isset($_GET['id'])){
                        echo 'Danh sách các hóa đơn';
                    }else{
                        echo 'Chi tiết hóa đơn '.$_GET['id'];
                    }
                ?>
            </h4>
        </div>
        <div class="modal-body">
                <div class="checkout-page steps active">
                    <div class="step-description">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <?php
                                    if(isset($_GET['id'])){
                                        include "ChiTietHoaDon.php";
                                    }else{
                                        include "DanhSacHoaDonNguoiDung.php";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>