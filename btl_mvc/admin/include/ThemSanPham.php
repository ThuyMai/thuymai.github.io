<div class="form-horizontal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            <h4 class="modal-title">Thêm mới sản phẩm</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="model/md_ThemSanPham.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label" >Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" name="tensanpham" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3"class="col-sm-2 control-label">Giá sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" name="giasanpham"  class="form-control" id="inputEmail3" placeholder="Giá sản phẩm (x1000 VNĐ)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea class="ckeditor" name="mota" id="message-text" placeholder="Mô tả"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <input type="file"name="fileToUpload" id="fileToUpload">
                        <p class="help-block">Chọn hình ảnh cho sản phẩm.</p>
                    </div>
                </div>
                <input type="hidden" name="cmd" value="themsanpham"/>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Thêm mới</button>
                    </div>
                </div>
                <?php
                    if(isset($_SESSION['ss'])){
                        if($_SESSION['ss']=='t'){
                            echo '<div class="alert alert-success">
                                     <strong>Thành công!</strong> Sản phẩm đã được thêm mới.
                                  </div>';
                        }else{
                            echo '<div class="alert alert-danger">
                                      <strong>Lỗi!</strong> Sản phẩm chưa được thêm.
                                  </div>';
                        }
                        unset($_SESSION['ss']);
                    }
                ?>
            </form>
        </div>
    </div>
</div>
