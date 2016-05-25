<div class="container_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="title contact-title">
                    Thông tin liên hệ
                </h5>
                <div class="clearfix">
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/d/embed?mid=zbrEvMBctL1I.k7wtSMvFVRrY" width="600" height="350"></iframe>
                </div>
                <div class="clearfix">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-infoormation">
                            <h5>
                                Giới thiệu chung
                            </h5>
                            <p>
                                Đây là website chúng tôi lập trình ra để phục vụ bài tập lớn môn lập trình web tại trường Đại học
                                Thăng Long. Vì thời gian thực hiện dự án tương đối ít nên một số chức năng chưa được hoàn thiện và
                                nhóm sẽ tiếp tục hoàn thiện trong thời gian tới.
                            </p>
                            <ul>
                                <li>
                                    <span class="icon">
                                      <img src="images/message.png" alt="">
                                    </span>
                                                <p>
                                                    quytutlu@gmail.com
                                                    <br>
                                                    thuymai@gmail.com
                                                </p>
                                            </li>
                                            <li>
                                    <span class="icon">
                                      <img src="images/phone.png" alt="">
                                    </span>
                                                <p>
                                                    01688 55 88 10
                                                    <br>
                                                    01653 27 27 38
                                                </p>
                                            </li>
                                            <li>
                                    <span class="icon">
                                      <img src="images/address.png" alt="">
                                    </span>
                                    <p>
                                        Trường Đại học Thăng Long đường Nghiêm Xuân Yêm, phường Đại Kim, Quận Hoàng Mai
                                        <br>
                                        Hà Nội, Việt Nam
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ContactForm">
                            <h5>
                                Hãy gửi những thắc mắc của bạn về cho chúng tôi
                            </h5>
                            <form id="form_phanhoi" method="post">
                                <input type="hidden" name="controller" value="phanhoi">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Họ và tên
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input class="inputfild" type="text" name="HoVaTen" id="HoVaTen">
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            Email
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input class="inputfild" type="email" name="Email" id="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            Điều bạn muốn nhắn nhủ
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                      <textarea class="inputfild" rows="8" name="NoiDung" id="NoiDung"></textarea>
                                    </div>
                                </div>
                                <button class="pull-right">
                                    Gửi tin nhắn
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <?php include "view/NhaCungCap.php" ?>
    </div>
</div>
<script type="text/javascript">
    $('#form_phanhoi').submit(function(ev) {
        var HoVaTen=$('#HoVaTen').val();
        var Email=$('#Email').val();
        var NoiDung=$('#NoiDung').val();
        if(HoVaTen==""){
            alert("Lỗi! Họ và tên không được để trống");
            return false;
        }
        if(Email==""){
            alert("Lỗi! Email không được để trống");
            return false;
        }
        if(NoiDung==""){
            alert("Lỗi! Nội dung không được để trống");
            return false;
        }
    });
</script>