<?php
    session_start();
?>
<center><p style="font-size: 200%;margin:auto">HÓA ĐƠN BÁN HÀNG</p>
<?php
  include("../model/connect.php");
  $now=date("Y-m-d");
  $timestamp = strtotime($now);
  $sql='SELECT * from thanhvien WHERE TenDangNhap="'.$_SESSION["user"].'"';
  $kq=mysql_query($sql);
  $r=mysql_fetch_array($kq)
  
?>
<p style="margin:auto">Ngày <?php echo date("d", $timestamp); ?> tháng <?php echo date("m", $timestamp);  ?> năm <?php echo date("Y", $timestamp);  ?></p></center>
<table style="margin:auto" width="760" border="0">
  <tr>
    <td width="760">Tên khách hàng: <?php echo $r["TenDangNhap"] ?></td>
  </tr>
  <tr>
    <td width="760">Địa chỉ: <?php echo $r["DiaChi"] ?> </td>
  </tr>
  <tr>
    <td width="760">SĐT: <?php echo $r["SDT"] ?> </td>
  </tr>
  <tr>
    <td width="760"></br> </td>
  </tr>
</table>
<table style="margin:auto" width="760" border="1" cellspacing="0" cellpadding="0" style="border:1px solid #333">
  <tr align="center" height="30" style="font-weight:bold">
    <td width="50" style="border-right:1px solid #666">STT</td>
    <td width="250" style="border-right:1px solid #666">Sản phẩm</td>
    <td width="60" style="border-right:1px solid #666">SL</td>
    <td width="130" style="border-right:1px solid #666">Giá</td>
    <td width="130" style="border-right:1px solid #666">Thành tiền</td>            
  </tr>

<?php 
  
  $sql='CALL LaySanPhamDaThanhToan("'.$_SESSION['user'].'","'.$_GET['NgayThanhToan'].'")';
    //echo $sql;
  $kq=mysql_query($sql);
  $i=1;
  $tien=0;
  //echo var_dump($now);
  while($r=mysql_fetch_array($kq))
  {
?>
  <tr align="center" height="30">
    <td width="50"><?php echo $i ?></td>
    <td width="250"><?php echo $r["TenSanPham"] ?></td>
    <td width="60"><?php echo $r["SoLuong"] ?></td>
    <td width="130"><?php echo number_format($r["GiaSanPham"]."000",0,'',',')?></td>
    <td width="130"><?php echo number_format($r["SoLuong"]*$r["GiaSanPham"]."000",0,'',',') ?></td>
  </tr>
<?php
    $tien+=$r["SoLuong"]*$r["GiaSanPham"];
    $i++;
  }
    $tien*=1000;
?>
  
</table>
<table style="margin:auto" width="760" border="0">
  <tr align="right" height="30">
    <td colspan="5">Tổng tiền hàng:<b > <?php echo number_format($tien,0,'',',') ?></b></td>
  </tr>
  <tr align="right" height="30">
    <td colspan="5">Số tiền bằng chữ: <b ><?php echo VndText($tien) ?></b></td>
  </tr>
</table>
<table style="margin:auto" width="760" border="0">
  <tr align="center" height="30">
    <td width="190"><b>Kế toán trưởng</b><br>(Ký, họ tên)</td>
    <td width="190"><b>Thủ kho</b><br>(Ký, họ tên)</td>
    <td width="190"><b>Người nhận</b><br>(Ký, họ tên)</td>
    <td width="190"><b>Giám đốc</b><br>(Ký, họ tên)</td>
  </tr>
</table>
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