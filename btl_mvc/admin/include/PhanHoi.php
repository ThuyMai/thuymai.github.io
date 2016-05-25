<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Phản hồi khách hàng</h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "model/connect.php";
                $sql="SELECT * FROM PhanHoi ORDER BY idPhanHoi DESC";
                $kq=mysql_query($sql);
                while($row=mysql_fetch_array($kq)){
                    echo '
                        <tr>
                            <td>'.$row['HoVaTen'].'</td>
                            <td>'.$row['Email'].'</td>
                            <td><textarea rows="3" disabled>'.$row['NoiDung'].'</textarea></td>
                        </tr>';
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>