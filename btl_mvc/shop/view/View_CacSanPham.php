<div class="container_fullwidth">
    <div class="container">
        <div class="hot-products">
            <h3 class="title">Các <strong>sản phẩm</strong></h3>
            <ul id="hot">
                <?php
                $demli=0;
                $flagli=0;

                $demdiv=0;
                $flagdiv=0;
                $rows=0;
                foreach($TatCaSanPham as $item=>$ob_SanPham){
                    $rows++;
                    if($flagli==0){
                        echo '<li>';
                        $flagli=1;
                    }
                    if($flagdiv==0){
                        $flagdiv=1;
                        echo '<div class="row">';
                    }
                    $like="";
                    $action="";
                    if($ob_SanPham->SoLuongBinhChon!=NULL){
                        $like="";
                        $action="unlike";
                    }else{
                        $like="-o";
                        $action="like";
                    }
                    echo '<form id="'.$ob_SanPham->idSanPham.'" method="post" action="index.php"><div class="col-md-3 col-sm-6">
                          <div class="products">';
                                if($ob_SanPham->ThuocTinh!='-1'){
                                    echo '<div class="offer">'.$ob_SanPham->ThuocTinh.'</div>';
                                }
                                echo '<div class="thumbnail"><a href="#" onclick="SubmitForm(ct'.$ob_SanPham->idSanPham.','.$ob_SanPham->idSanPham.',\'chitietsanpham\')"><img width="170" height="170" src="../admin/anh/'.$ob_SanPham->AnhSanPham.'" alt="Product Name"></a></div>
                             <div class="productname">'.$ob_SanPham->TenSanPham.'</div>
                             <h4 class="price">'.number_format($ob_SanPham->GiaSanPham."000",0,'','.').' VNĐ</h4>
                             <input type="hidden" id="ct'.$ob_SanPham->idSanPham.'" name="controller" value="themgiohang"/>
                             <input type="hidden" name="idSanPham" value="'.$ob_SanPham->idSanPham.'"/>
                             <input type="hidden" name="action" value="'.$action.'"/>
                             <input type="hidden" name="sl" value="1"/>
                             <div class="button_group"><button class="button add-cart" type="submit">Thêm vào giỏ</button>
                             <a href="#" onclick="SubmitForm(ct'.$ob_SanPham->idSanPham.','.$ob_SanPham->idSanPham.',\'binhchon\')">
                                <button class="button wishlist" type="button">
                                    <i class="fa fa-heart'.$like.'" ></i>
                                </button>
                             </a>
                             </div>
                          </div>
                       </div></form>';
                    if($demdiv==3){
                        $demdiv=-1;
                        $flagdiv=0;
                        echo '</div>';
                    }
                    if($demli==7){
                        $flagli=0;
                        $demli=-1;
                        echo '</li>';
                    }
                    $demli++;
                    $demdiv++;
                }
                ?>
            </ul>
            <div class="control">
                <div class="pager">
                    <form id="fr_sp" method="post">
                        <input type="hidden" id="in_p" name="p" value="">
                        <input type="hidden" id="control"  name="controller" value="page">
                        <a id="" class="prev" href="#" onclick="getPage('in_p','fr_sp','-2');">&lt;</a>
                        <?php
                        $page=isset($_SESSION['page'])?$_SESSION['page']:1;
                        $SoLuongTrang=0;
                        for($i=1;$i<=$sl/8+1;$i++){
                            $SoLuongTrang++;
                            ?>
                            <a href="#" onclick="getPage('in_p','fr_sp',<?php echo $i;?>)" <?php if($i==$page){echo 'class="active"';}?>>
                                <?php echo $i;?>
                            </a>
                            <?php
                        }
                        $_SESSION['SoLuongTrang']=$SoLuongTrang;
                        ?>
                        <a class="next" href="#" onclick="getPage('in_p','fr_sp','-1');">&gt;</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="our-brand">
            <div class="control">
                <div class="pager">
                    <form id="fr_sp" method="post">

                        <a id="" class="prev" href="#" onclick="getPage('in_p','fr_sp',-2);">&lt;</a>
                        <input type="hidden" id="in_p" name="p" value="">
                        <input type="hidden" id="control"  name="controller" value="page">
                        <?php
                        $page=isset($_SESSION['page'])?$_SESSION['page']:1;
                        for($i=1;$i<=$sl/8+1;$i++){
                            ?>
                            <a href="#" onclick="getPage('in_p','fr_sp',<?php echo $i;?>)" <?php if($i==$page){echo 'class="active"';}?>>
                                <?php echo $i;?>
                            </a>
                            <?php
                        }
                        ?>
                        <a class="next" href="#" onclick="getPage('in_p','fr_sp',-1)">&gt;</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php include "view/NhaCungCap.php";?>
    </div>
</div>
<script language="JavaScript">
    function SubmitForm(id,val,action){
        //id chứa dữ liệu ở thẻ input
        //val id form muốn submit
        // action giá trị ở trong thẻ input

        document.getElementById(id.id).value=action;
        document.getElementById(val).submit();
    }
    function getPage(id,val,action){
        //id chứa dữ liệu ở thẻ input
        //val id form muốn submit
        // action giá trị ở trong thẻ input
        //alert(action);
        document.getElementById(id).value=action;
        document.getElementById(val).submit();
    }
</script>
