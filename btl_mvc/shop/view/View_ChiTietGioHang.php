<?php

/**
 *
 *		Phiên bản: 0.1
 *		Tên lớp: NL_CheckOut
 *		Chức năng: Tích hợp thanh toán qua nganluong.vn cho các merchant site có đăng ký API
 *						- Xây dựng URL chuyển thông tin tới Nganluong.vn để xử lý việc thanh toán cho merchant site.
 *						- Xác thực tính chính xác của thông tin đơn hàng được gửi về từ nganluong.vn.
 *
 **/

class NL_Checkout
{
    // URL chheckout của nganluong.vn
    private $nganluong_url = 'https://www.nganluong.vn/checkout.php';

    // Mã merchante site
    private $merchant_site_code = '39699';	// Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site

    // Mật khẩu bảo mật
    private $secure_pass= '60648994t'; // Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site

    //Hàm xây dựng url, trong đó có tham số mã hóa (còn gọi là public key)
    public function buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price)
    {

        // Mảng các tham số chuyển tới nganluong.vn
        $arr_param = array(
            'merchant_site_code'=>	strval($this->merchant_site_code),
            'return_url'		=>	strtolower(urlencode($return_url)),
            'receiver'			=>	strval($receiver),
            'transaction_info'	=>	strval($transaction_info),
            'order_code'		=>	strval($order_code),
            'price'				=>	strval($price)
        );
        $secure_code ='';
        $secure_code = implode(' ', $arr_param) . ' ' . $this->secure_pass;
        $arr_param['secure_code'] = md5($secure_code);

        /* Bước 2. Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào*/
        $redirect_url = $this->nganluong_url;
        if (strpos($redirect_url, '?') === false)
        {
            $redirect_url .= '?';
        }
        else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
        {
            // Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
            $redirect_url .= '&';
        }

        /* Bước 3. tạo url*/
        $url = '';
        foreach ($arr_param as $key=>$value)
        {
            if ($url == '')
                $url .= $key . '=' . $value;
            else
                $url .= '&' . $key . '=' . $value;
        }

        return $redirect_url.$url;
    }

    /*Hàm thực hiện xác minh tính đúng đắn của các tham số trả về từ nganluong.vn*/

    public function verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)
    {
        // Tạo mã xác thực từ chủ web
        $str = '';
        $str .= ' ' . strval($transaction_info);
        $str .= ' ' . strval($order_code);
        $str .= ' ' . strval($price);
        $str .= ' ' . strval($payment_id);
        $str .= ' ' . strval($payment_type);
        $str .= ' ' . strval($error_text);
        $str .= ' ' . strval($this->merchant_site_code);
        $str .= ' ' . strval($this->secure_pass);

        // Mã hóa các tham số
        $verify_secure_code = '';
        $verify_secure_code = md5($str);

        // Xác thực mã của chủ web với mã trả về từ nganluong.vn
        if ($verify_secure_code === $secure_code) return true;

        return false;
    }
}
?>

<div class="container_fullwidth">
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(count($ListItemGioHang)!=0){
                        echo '<h3 class="title">
                                Thông tin giỏ hàng của bạn
                            </h3>
                            <div class="clearfix">
                            </div>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Ảnh</h6>
                            </th>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Chi tiết</h6>
                            </th>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Giá</h6>
                            </th>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Số lượng</h6>
                            </th>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Thành tiền</h6>
                            </th>
                            <th style="text-align: center;font-weight: bold">
                                <h6>Xóa</h6>
                            </th>
                        </tr>
                        </thead>';
                    }else{
                        echo '<a href="index.php"><img src="images/KhongCoHang.png"></a>';
                        echo '<script type="text/JavaScript">
                        window.setTimeout( function(){
                             window.location = "index.php";
                        }, 10000 );
                        </script>';
                    }
                ?>
                    <tbody>
                    <?php
                    $Tong=0;
                    foreach($ListItemGioHang as $ob_itemGioHang){
                        $sl=$ob_itemGioHang->SoLuongBinhChon==NULL?0:$ob_itemGioHang->SoLuongBinhChon;
                        $Tong+=$ob_itemGioHang->SoLuong*$ob_itemGioHang->GiaSanPham;
                        echo '<tr>
                    <td style="vertical-align: middle; text-align:center">
                        <form id="'.$ob_itemGioHang->idSanPham.'" method="post">
                            <a href="#" onclick="document.getElementById(\''.$ob_itemGioHang->idSanPham.'\').submit();">
                                <input type="hidden" name="controller" value="chitietsanpham">
                                <input type="hidden" name="idSanPham" value="'.$ob_itemGioHang->idSanPham.'">
                                <img style="vertical-align: middle;" width="150px" height="150px" src="../admin/anh/'.$ob_itemGioHang->AnhSanPham.'" alt="">
                            </a>
                        </form>
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          '.$ob_itemGioHang->TenSanPham.'
                        </div>
                        <p>
                          <img alt="" src="images/star.png">
                          <a class="review_num" href="#">
                            '.$sl.' Vote
                          </a>
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
                            TM '.$ob_itemGioHang->idSanPham.'
                          </strong>
                        </p>
                      </div>
                    </td>
                    <td style="vertical-align: middle;text-align:center">
                      <h5>
                        '.number_format($ob_itemGioHang->GiaSanPham."000",0,'','.').'VNĐ
                      </h5>
                    </td>
                    <td style="vertical-align: middle; text-align:center">
                      <select name="" disabled>
                        <option selected value="1">
                          '.$ob_itemGioHang->SoLuong.'
                        </option>

                      </select>
                    </td>
                    <td style="vertical-align: middle; text-align:center">
                      <h5>
                        <strong class="red">
                          '.number_format($ob_itemGioHang->SoLuong*$ob_itemGioHang->GiaSanPham."000",0,'','.').'VNĐ
                        </strong>
                      </h5>
                    </td>
                    <td style="vertical-align: middle; text-align:center">
                      <form id="'.$ob_itemGioHang->idGioHang.'" method="get">
                          <input type="hidden" name="controller" value="xoagiohangchitiet">
                          <input type="hidden" name="idGioHang" value="'.$ob_itemGioHang->idGioHang.'">
                          <input type="hidden" name="action" value="chitietgiohang">
                          <a href="#" onclick="document.getElementById(\''.$ob_itemGioHang->idGioHang.'\').submit();">
                            <img src="images/remove.png" alt="">
                          </a>
                      </form>
                    </td>
                  </tr>';
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                    if(count($ListItemGioHang)!=0){
                        echo '<a href="index.php">
                                <button class="pull-left">
                                    Tiếp tục mua hàng
                                </button>
                            </a>';
                        echo '<div class="clearfix"></div>
                             <div class="row">
                                <div class="shippingbox">
                                    <div class="grandtotal">
                                        <h5>
                                            Tổng tiền hàng:
                                        </h5>
                                  <span>';
                                    echo number_format($Tong."000",0,'','.').' VNĐ';
                        echo '
                                  </span>
                                    </div>
                                    <div class="grandtotal">
                                        <h5>
                                            Chiết khấu:
                                        </h5>
                                  <span>
                                    0%
                                  </span>
                                    </div>
                                    <div class="grandtotal">
                                        <h5>
                                            Tổng hóa đơn:
                                        </h5>
                                  <span>';
                                    echo number_format($Tong."000",0,'','.').' VNĐ';
                        echo '
                                  </span>
                                    </div>
                                    <div class="grandtotal">
                                        <h5>
                                            Bằng chữ:
                                        </h5>
                                  <span>';
                                        echo VndText($Tong.'000');
                        echo '
                                  </span>

                                    </div>
                                    <div class="grandtotal text-right">';

                                        $receiver="quytutlu@gmail.com";
                                        //Khai báo url trả về
                                        $return_url="http://nguyenquytu.com/btl_mvc/shop/controller/xacthucthanhtoan.php";
                                        //Giá của cả giỏ hàng
                                        $price=$Tong.'000';
                                        //Mã giỏ hàng
                                        $order_code=$_SESSION['user'];
                                        //Thông tin giao dịch
                                        $transaction_info="Giao dịch tại mua bán online";
                                        //Khai báo đối tượng của lớp NL_Checkout
                                        $nl= new NL_Checkout();
                                        //Tạo link thanh toán đến nganluong.vn
                                        $url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info,  $order_code, $price);
                                        echo '<a target="_blank" href="'.$url.'"><img src="images/pay.gif" alt=""></a>';

                        echo '
                                    </div>

                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <?php include "view/NhaCungCap.php" ?>
    </div>
</div>

<?php
function VndText($amount)
{
    $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
    $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
    $textnumber = "";
    $length = strlen($amount);

    for ($i = 0; $i < $length; $i++)
        $unread[$i] = 0;

    for ($i = 0; $i < $length; $i++)
    {
        $so = substr($amount, $length - $i -1 , 1);

        if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
            for ($j = $i+1 ; $j < $length ; $j ++)
            {
                $so1 = substr($amount,$length - $j -1, 1);
                if ($so1 != 0)
                    break;
            }

            if (intval(($j - $i )/3) > 0){
                for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                    $unread[$k] =1;
            }
        }
    }

    for ($i = 0; $i < $length; $i++)
    {
        $so = substr($amount,$length - $i -1, 1);
        if ($unread[$i] ==1)
            continue;

        if ( ($i% 3 == 0) && ($i > 0))
            $textnumber = $TextLuythua[$i/3] ." ". $textnumber;

        if ($i % 3 == 2 )
            $textnumber = 'trăm ' . $textnumber;

        if ($i % 3 == 1)
            $textnumber = 'mươi ' . $textnumber;


        $textnumber = $Text[$so] ." ". $textnumber;
    }

    //Phai de cac ham replace theo dung thu tu nhu the nay
    $textnumber = str_replace("không mươi", "lẻ", $textnumber);
    $textnumber = str_replace("lẻ không", "", $textnumber);
    $textnumber = str_replace("mươi không", "mươi", $textnumber);
    $textnumber = str_replace("một mươi", "mười", $textnumber);
    $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
    $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
    $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

    return ucfirst($textnumber." đồng chẵn");
}
?>