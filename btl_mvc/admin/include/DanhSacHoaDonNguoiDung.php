<table class="table table-bordered">
    <thead>
    <tr>
        <th style="text-align: center;font-weight: bold">
            <h5>STT</h5>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h5>Tên đăng nhập</h5>
        </th>
        <th style="text-align: center;font-weight: bold">
            <h5>Ngày lập hóa đơn</h5>
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    $Tong=0;
    include "model/connect.php";
    if (isset($_SESSION['useradmin'])) {
        $sql = 'Call LayDanhSachHoaDonAdmin()';
        $kq = mysql_query($sql);
        $sl = mysql_num_rows($kq);
        $stt=1;
        $row=mysql_fetch_array($kq);
        $TenDangNhap=$row['TenDangNhap'];
        $SoDong=$row['SoLuong'];
        $flag=true;
        while ($row !=null) {
            if($flag){
                $flag=false;
                $SoDong=$row['SoLuong'];
                echo '<tr>';
                echo '<td rowspan="'.$SoDong.'" style="vertical-align: middle; text-align: center">
                            <h5>'.$stt.'</h5>
                        </td>
                        <td rowspan="'.$SoDong.'" style="vertical-align: middle; text-align: center">
                          <h5>'.$row['TenDangNhap'].'</h5>
                        </td>';
                $stt++;
            }
            echo '<td style="vertical-align: middle; text-align: center">
                      <a href="index.php?cmd=danhsachhoadon&id='.$row['NgayThanhToan'].'&user='.$row['TenDangNhap'].'">
                        <h5>'.$row['NgayThanhToan'].'</h5>
                      </a>
                    </td>
                  </tr>';
            $row=mysql_fetch_array($kq);
            if($TenDangNhap!=$row['TenDangNhap']){
                $TenDangNhap=$row['TenDangNhap'];
                $flag=true;
            }
        }
        mysql_close();
    }
    ?>
    </tbody>
</table>