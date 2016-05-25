<table class="table table-bordered">
    <thead>
    <tr>
        <th style="text-align: center;font-weight: bold">
            <h6>Ảnh</h6>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h6>Thông tin sản phẩm</h6>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h6>Giá sản phẩm</h6>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h6>Số lượng</h6>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h6>Thành tiền</h6>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(isset($_GET['id'])) {
        include "model/connect.php";
        if (isset($_GET['user'])) {
            $sql = 'Call LayThongTinHoaDonKhachHang("' . $_GET['user'] . '","'.$_GET['id'].'")';
            $kq = mysql_query($sql);
            $sl = mysql_num_rows($kq);
            $Tong = 0;
            while ($row = mysql_fetch_array($kq)) {
                $Tong += $row['SoLuong'] * $row['GiaSanPham'];
                echo '<tr>
                    <td style="vertical-align: middle; text-align: center">
                        <form method="post" id="'.$row['idSanPham'].'" action="../shop/index.php">
                            <input type="hidden" name="controller" value="chitietsanpham">
                            <input type="hidden" name="idSanPham" value="'.$row['idSanPham'].'">
                            <img width="70px" height="70px" src="../admin/anh/' . $row['AnhSanPham'] . '" alt="">
                        </form>
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          ' . $row['TenSanPham'] . '
                        </div>
                        <p>
                          <img alt="" src="../shop/images/star.png">
                        </p>
                        <div class="color-choser">
                          <span class="text">
                            Màu của sản phẩm :
                          </span>
                          <ul>
                            <li>
                              <a class="black-bg" href="#">
                                black
                              </a>
                            </li>
                            <li>
                              <a class="red-bg" href="#">
                                light red
                              </a>
                            </li>
                          </ul>
                        </div>
                        <p>
                          Mã sản phẩm :
                          <strong class="pcode">
                            TM ' . $row['idSanPham'] . '
                          </strong>
                        </p>
                      </div>
                    </td>
                    <td style="vertical-align: middle; text-align: center">
                      <h5>
                        ' . number_format($row['GiaSanPham'] . "000", 0, '', '.') . ' VNĐ
                      </h5>
                    </td>
                    <td style="vertical-align: middle; text-align: center">
                      <h5>
                          ' . $row['SoLuong'] . '
                       </h5>

                      </select>
                    </td>
                    <td style="vertical-align: middle; text-align: center">
                      <h5>
                        <strong class="red">
                          ' . number_format($row['SoLuong'] * $row['GiaSanPham'] . "000", 0, '', '.') . ' VNĐ
                        </strong>
                      </h5>
                    </td>
                  </tr>';
            }
            mysql_close();
        }
    }
    ?>
    <tr>
        <td colspan="6" style="text-align: right;font-weight: bold"><h5>Tổng hóa đơn: <?php echo '<strong style="color: #ff3a3a">'.number_format($Tong . "000", 0, '', '.').' VNĐ'.'</strong>';?></h5> </td>
    </tr>
    </tbody>
</table>
<a href="index.php?cmd=danhsachhoadon">Xem hóa đơn khác</a>