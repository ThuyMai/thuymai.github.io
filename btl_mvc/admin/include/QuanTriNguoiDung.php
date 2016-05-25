
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Danh sách người dùng</h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    include "model/connect.php";
                    $sql="SELECT * FROM ThanhVien";
                    $kq=mysql_query($sql);
                    while($row=mysql_fetch_array($kq)){
                    echo '
                        <tr>
                            <form method="post" action="model/md_QuanTriNguoiDung.php" >
                            <input type="hidden" name="idThanhVien" value="'.$row['idThanhVien'].'">
                            <td>'.$row['TenDangNhap'].'</td>
                            <input type="hidden" name="MatKhau1" value="'.$row['MatKhau'].'">
                            <td><input type="text" class="form-control" name="MatKhau2" value="'.$row['MatKhau'].'"/></td>
                            <td>'.$row['SDT'].'</td>
                            <td>'.$row['DiaChi'].'</td>
                            <td><input type="text" class="form-control" name="Quyen" value="'.$row['Quyen'].'"/></td>
                            <td>
                                <button class="button compare" type="submit" name="edit">
                                  <i class="fa fa-pencil-square-o">
                                  </i>
                                </button>
                            </td>
                            <td>
                                <button class="button compare" name="delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')" >
                                  <i class="fa fa-trash">
                                  </i>
                                </button>
                            </td>

                            </form>
                        </tr>';
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>