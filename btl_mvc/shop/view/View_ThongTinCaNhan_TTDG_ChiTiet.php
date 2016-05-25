<table class="table table-bordered" style="margin-top: 50px">
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
        $Tong=0;
        foreach ($ListSanPham as $item=>$ob_HoaDon) {
            $Tong += $ob_HoaDon->SoLuong * $ob_HoaDon->GiaSanPham;
            echo '<tr>
                <td style="vertical-align: middle; text-align: center">
                  <form id="'.$ob_HoaDon->idSanPham.'" method="post">
                    <input type="hidden" name="controller" value="chitietsanpham">
                    <input type="hidden" name="idSanPham" value="'.$ob_HoaDon->idSanPham.'">
                    <a href="#" onclick="document.getElementById(\''.$ob_HoaDon->idSanPham.'\').submit();"><img width="70px" height="70px" src="../admin/anh/' . $ob_HoaDon->AnhSanPham . '" alt=""></a>
                  </form>
                </td>
                <td>
                  <div class="shop-details">
                    <div class="productname">
                      ' .$ob_HoaDon->TenSanPham . '
                    </div>
                    <p>
                      <img alt="" src="images/star.png">
                    </p>
                    <div class="color-choser">
                      <span class="text">
                        Màu của sản phẩm :
                      </span>
                      <ul>
                        <li>
                          <a class="black-bg " href="#">
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
                        TM ' . $ob_HoaDon->idSanPham . '
                      </strong>
                    </p>
                  </div>
                </td>
                <td style="vertical-align: middle; text-align: center">
                  <h5>
                    ' . number_format($ob_HoaDon->GiaSanPham . "000", 0, '', '.') . 'VNĐ
                  </h5>
                </td>
                <td style="vertical-align: middle; text-align: center">
                  <h5>
                      ' . $ob_HoaDon->SoLuong . '
                   </h5>

                  </select>
                </td>
                <td style="vertical-align: middle; text-align: center">
                  <h5>
                    <strong class="red">
                      ' . number_format($ob_HoaDon->SoLuong * $ob_HoaDon->GiaSanPham . "000", 0, '', '.') . 'VNĐ
                    </strong>
                  </h5>
                </td>
              </tr>';
    }
    ?>
    <tr>
        <td colspan="6" style="text-align: right;font-weight: bold"><h6>Tổng hóa đơn: <?php echo number_format($Tong . "000", 0, '', '.').' VNĐ';?></h6> </td>
    </tr>
    </tbody>
</table>