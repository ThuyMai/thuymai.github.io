<?php
session_start();
$target_dir = "../anh/";
$date=time();
$target_file = $target_dir . $date.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $_SESSION['ss']='f';
        header("Location:../index.php?cmd=themsanpham");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $_SESSION['ss']='f';
    header("Location:../index.php?cmd=themsanpham");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $_SESSION['ss']='f';
    header("Location:../index.php?cmd=themsanpham");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION['ss']='f';
    header("Location:../index.php?cmd=themsanpham");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $_SESSION['ss']='f';
    header("Location:../index.php?cmd=themsanpham");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        include "connect.php";
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $TenSanPham = $_POST['tensanpham'];
        $GiaSanPham = $_POST['giasanpham'];
        $MoTa=mysql_real_escape_string($_POST['mota']);
        $sql='insert into SanPham(TenSanPham,MoTaSanPham,GiaSanPham,AnhSanPham) values("'.$TenSanPham.'","'.$MoTa.'","'.$GiaSanPham.'","'.$date.basename( $_FILES["fileToUpload"]["name"]).'")';
        $kq=mysql_query($sql);
        if($kq){
            //echo 'them thanh cong';
            $_SESSION['ss']='t';
            header("Location:../index.php?cmd=themsanpham");
        }else{
            $_SESSION['ss']='f';
            header("Location:../index.php?cmd=themsanpham");
        }
    } else {
        $_SESSION['ss']='f';
        header("Location:../index.php?cmd=themsanpham");
    }
}
?>