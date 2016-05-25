<?php
  include "model/connect.php";
  if(!isset($_GET['search'])){
    $sql="SELECT * FROM SanPham";
    $kq=mysql_query($sql);
    $rows=mysql_num_rows($kq);
    $page=isset($_GET['p'])?$_GET['p']:1;
    $sql ='Call PhanTrangSanPham('.$page.')';
    $kq=mysql_query($sql);
  }else{
    $sql="SELECT * FROM SanPham";
    $kq=mysql_query($sql);
    $rows=mysql_num_rows($kq);

    $sql='SELECT * FROM SanPham WHERE idSanPham='.$_GET['search'];
    $kq=mysql_query($sql);
    $page=isset($_GET['p'])?$_GET['p']:1;
  }
?>
<link href="../shop/css/style.css" rel="stylesheet">
<div class="row">
  <div class="col-md-12">
    <div class="products-list">
      <div class="pager">
        <?php
         for($i=1;$i<$rows/4+1;$i++){
           ?>
          <a href="index.php?cmd=danhsachsanpham&p=<?php echo $i;?>" <?php if($i==$page){echo 'class="active"';}?>>
            <?php echo $i;?>
          </a>
        <?php
         }
        ?>
      </div>
      <div class="col-md-12" style="height: 41px;">
        <form method="get">
          <input type="hidden" name="cmd" value="danhsachsanpham"/>
          <input class="search-submit" style="display: none" type="submit" value="">
          <input class="search-input" style="display: block; top:10px" placeholder="Nhập mã sản phẩm" type="text" value="" name="search">
        </form>
      </div>
      <ul class="products-listItem">
        <?php
          while($row=mysql_fetch_array($kq)){
          ?>
            <li class="products">
              <form method="post" action="model/Sua_XoaSanPham.php">
              <div class="thumbnail">
                <img src="anh/<?php echo $row['AnhSanPham']?>" alt="Product Name">
              </div>
              <div class="product-list-description">
                <div class="productname">
                  <input type="text" style="width: 400px" name="TenSanPham" value="<?php echo $row['TenSanPham']?>"/>
                </div>
                <p>
                  <img src="../shop/images/star.png" alt="">
                  <a href="#" class="review_num">
                    <?php
                      if(isset($row['SoLuongBinhChon']))
                      {
                        echo ($row['SoLuongBinhChon']==NULL?0:$row['SoLuongBinhChon']).' Vote';
                      }else{
                        echo '0 Vote';
                      }
                    ?>
                  </a>
                </p>
                <p>
                  <textarea class="ckeditor" style="height: 90px" name="mota" id="message-text" placeholder="Mô tả"><?php echo $row['MoTaSanPham']?></textarea>
                </p>
                <input type="hidden" name="idSanPham" value="<?php echo $row['idSanPham'];?>">
                <div class="list_bottom">
                  <div class="price">
                    <label class="control-label">Giá: </label>
                    <input type="text" name="GiaSanPham" value="<?php echo $row['GiaSanPham']?>"/>
                  </div>
                  <div class="price">
                    <label class="control-label">Note: </label>
                    <input type="text" name="ThuocTinh" value="<?php echo $row['ThuocTinh']?>"/>
                  </div>

                  <div class="button_group">
                    <button class="button compare" type="submit" name="edit">
                      <i class="fa fa-pencil-square-o">
                      </i>
                    </button>
                    <button class="button compare" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="delete">
                      <i class="fa fa-trash">
                      </i>
                    </button>
                  </div>
                </div>
              </div>
              </form>
            </li>
            <?php
              }
            ?>
      </ul>
    </div>
  </div>
</div>
<?php
if(isset($_SESSION['kqedsp'])){
  if($_SESSION['kqedsp']==1){
    echo '<script language="javascript">';
    echo 'alert("Bạn vừa cập nhật thành công sản phẩm");';
    echo '</script>';
  }else{
    echo '<script language="javascript">';
    echo 'alert("Sản phẩm chưa được cập nhật");';
    echo '</script>';
  }
  unset($_SESSION['kqedsp']);
}
if(isset($_SESSION['kqde'])){
  if($_SESSION['kqde']==1){
    echo '<script language="javascript">';
    echo 'alert("Bạn vừa xóa thành công sản phẩm");';
    echo '</script>';
  }else{
    echo '<script language="javascript">';
    echo 'alert("Lỗi! sản phẩm chưa xóa cập nhật");';
    echo '</script>';
  }
  unset($_SESSION['kqde']);
}
?>


