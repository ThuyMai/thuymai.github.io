<?php
class ob_User{
    public $idThanhVien;
    public $TenDangNhap;
    public $MatKhau;
    public $SDT;
    public $DiaChi;
    public $Quyen;
    public function __construct($idThanhVien, $TenDangNhap, $MatKhau, $SDT, $DiaChi, $Quyen)
    {
        $this->idThanhVien = $idThanhVien;
        $this->TenDangNhap = $TenDangNhap;
        $this->MatKhau = $MatKhau;
        $this->SDT = $SDT;
        $this->DiaChi = $DiaChi;
        $this->Quyen = $Quyen;
    }

}
?>