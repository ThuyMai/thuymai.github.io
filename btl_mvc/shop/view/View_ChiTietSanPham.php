<div class="container_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form action="" method="post">
                    <div class="products-details">
                        <div class="preview_image">
                            <?php
                                echo '<div class="preview-small">
                                            <img id="zoom_03" src="../admin/anh/' .$SanPham->AnhSanPham.'" data-zoom-image="../admin/anh/'.$SanPham->AnhSanPham.'" alt="">
                                        </div>';
                                echo '<input type="hidden" name="idSanPham" value="'.$SanPham->idSanPham.'"/>';
                                echo '<input type="hidden" name="controller" value="themgiohang"/>';
                            ?>
                            <div class="thum-image">
                                <ul id="gallery_01" class="prev-thum">
                                    <?php
                                    for($i=0;$i<7;$i++){
                                        echo '
                                                <li>
                                                    <a href="#" data-image="../admin/anh/'.$SanPham->AnhSanPham.'" data-zoom-image="../admin/anh/'.$SanPham->AnhSanPham.'">
                                                        <img src="../admin/anh/' .$SanPham->AnhSanPham.'" alt="">
                                                    </a>
                                                </li>

                                            ';
                                    }
                                    ?>
                                </ul>
                                <a class="control-left" id="thum-prev" href="javascript:void(0);">
                                    <i class="fa fa-chevron-left">
                                    </i>
                                </a>
                                <a class="control-right" id="thum-next" href="javascript:void(0);">
                                    <i class="fa fa-chevron-right">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="products-description">
                            <h5 class="name">
                                <?php
                                echo $SanPham->TenSanPham;
                                ?>
                            </h5>
                            <p>
                                <img alt="" src="images/star.png">
                                <a class="review_num" href="#">
                                    <?php echo $SanPham->SoLuongBinhChon.' Vote'?>
                                </a>
                            </p>
                            <p>
                                Tình trạng:
                                <span class=" light-red">
                                  Còn hàng
                                </span>
                            </p>
                            <p>
                                Mã sản phẩm:
                                <span class=" light-red">
                                  <?php echo 'TM '.$SanPham->idSanPham?>
                                </span>
                            </p>
                            <hr class="border">
                            <div class="price">
                                Giá &nbsp;&nbsp;:
                                <span class="new_price">
                                  <?php
                                  echo number_format($SanPham->GiaSanPham."000",0,'','.');
                                  ?>
                                    <sup>
                                        VNĐ
                                    </sup>
                                </span>
                            </div>
                            <hr class="border">
                            <div class="wided">
                                <div class="qty">
                                    Qty &nbsp;&nbsp;:
                                    <select name="sl">
                                        <option>
                                            1
                                        </option>
                                        <option>
                                            3
                                        </option>
                                        <option>
                                            5
                                        </option>
                                        <option>
                                            10
                                        </option>
                                    </select>
                                </div>
                                <div class="button_group">
                                    <button class="button add-cart" type="submit">
                                        Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                            <hr class="border">
                            <img src="images/share.png" alt="" class="pull-right">
                        </div>
                    </div>
                </form>
                <div class="clearfix">
                </div>
                <div class="tab-box">
                    <div id="tabnav">
                        <ul>
                            <li>
                                <a href="#">
                                    MÔ TẢ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    ĐÁNH GIÁ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    TAGS SẢN PHẨM
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content-wrap">
                        <div class="tab-content" id="Descraption">
                            <p>
                                <?php
                                echo $SanPham->MoTaSanPham;
                                ?>
                            </p>
                        </div>
                        <div class="tab-content" id="Reviews">
                            <form>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <th>
                                            1 star
                                        </th>
                                        <th>
                                            2 stars
                                        </th>
                                        <th>
                                            3 stars
                                        </th>
                                        <th>
                                            4 stars
                                        </th>
                                        <th>
                                            5 stars
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Quality
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="Blue"/>
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Price
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Value
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Your Name
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="text" name="" class="input namefild">
                                        </div>
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Your Email
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="email" name="" class="input emailfild">
                                        </div>
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Summary of You Review
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                                            <input type="text" name="" class="input summeryfild">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                                Your Name
                                                <strong class="red">
                                                    *
                                                </strong>
                                            </label>
                            <textarea class="input textareafild" name="" rows="7" >
                            </textarea>
                                        </div>
                                        <div class="form-row">
                                            <input type="submit" value="Submit" class="button">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-content" >
                            <div class="review">
                                <p class="rating">
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star-half-o gray">
                                    </i>
                                    <i class="fa fa-star-o gray">
                                    </i>
                                </p>
                                <h5 class="reviewer">
                                    Reviewer name
                                </h5>
                                <p class="review-date">
                                    Date: 01-01-2014
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
                                </p>
                            </div>
                            <div class="review">
                                <p class="rating">
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star light-red">
                                    </i>
                                    <i class="fa fa-star-half-o gray">
                                    </i>
                                    <i class="fa fa-star-o gray">
                                    </i>
                                </p>
                                <h5 class="reviewer">
                                    Reviewer name
                                </h5>
                                <p class="review-date">
                                    Date: 01-01-2014
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
                                </p>
                            </div>
                        </div>
                        <div class="tab-content" id="tags">
                            <div class="tag">
                                Add Tags :
                                <input type="text" name="">
                                <input type="submit" value="Tag">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                </div>

                <div class="clearfix">
                </div>
            </div>
            <div class="col-md-3">

                <div class="clearfix">
                </div>
                <div class="product-tag leftbar">
                    <h3 class="title">
                        Tags
                        <strong>
                            Sản phẩm
                        </strong>
                    </h3>
                    <ul>
                        <li>
                            <a href="#">
                                Lincoln us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                SDress for Girl
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Corner
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Window
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                PG
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Oscar
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Bath room
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                PSD
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">
                </div>
                <div class="get-newsletter leftbar">
                    <h3 class="title">
                        Nhận bản tin
                        <strong>
                            cửa hàng
                        </strong>
                    </h3>
                    <p>
                        Đăng ký nhận bản tin.
                    </p>
                    <form>
                        <input class="email" type="text" name="" placeholder="Nhập email của bạn...">
                        <input class="submit" type="button" value="Đăng ký">
                    </form>
                </div>
                <div class="clearfix">
                </div>

                <div class="clearfix">
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <?php include "view/NhaCungCap.php"; ?>
    </div>
</div>