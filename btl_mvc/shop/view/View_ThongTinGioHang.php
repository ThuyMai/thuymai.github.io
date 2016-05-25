<li class="option-cart">
    <?php
    echo '<form id="fr_ghchitiet" method="post">
                <input type="hidden" name="controller" value="chitietgiohang">
                <a href="#" class="cart-icon" onclick="document.getElementById(\'fr_ghchitiet\').submit();">
                    <span class="cart_no">' . count($ListItemGioHang) . '</span>
                </a>
          </form>';
    echo '<ul class="option-cart-item">';
    $Tong=0;
    if(count($ListItemGioHang))
    foreach($ListItemGioHang as $item => $ob_itemGioHang ) {
        $Tong+=$ob_itemGioHang->GiaSanPham*$ob_itemGioHang->SoLuong;
        echo '<li>
                <div class="cart-item">
                    <div class="image"><img src="../admin/anh/'.$ob_itemGioHang->AnhSanPham.'" alt=""></div>
                    <div class="item-description">
                        <p class="name">'.$ob_itemGioHang->TenSanPham.'</p>
                        <p>Số lượng: <span class="light-red">'.$ob_itemGioHang->SoLuong.'</span></p>
                    </div>
                    <div class="right">
                        <p class="price">'.$ob_itemGioHang->GiaSanPham.'k</p>
                        <form id="'.$ob_itemGioHang->idGioHang.'" action="" method="post">
                            <input type="hidden" name="controller" value="xoagiohangchitiet">
                            <input type="hidden" name="idGioHang" value="'.$ob_itemGioHang->idGioHang.'">
                            <a href="#" class="remove" onclick="document.getElementById(\''.$ob_itemGioHang->idGioHang.'\').submit();"><img src="images/remove.png" alt="remove"></a>
                        </form>
                    </div>
                </div>
            </li>';
    }
    echo '<li><span class="total">Tổng <strong>'.number_format($Tong,0,'','.').'k</strong>
              </span>
                <form method="post">
                    <input type="hidden" name="controller" value="chitietgiohang">
                    <a href="#">
                        <button class="checkout" >CheckOut</button>
                    </a>
                </form>
           </li>
            </ul>';
    ?>

</li>