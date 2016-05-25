<?php
//phục vụ cho Model_CacSanPham, Model_ChiTietSanPham
class ob_SanPham{
    public $idSanPham;
    public $TenSanPham;
    public $MoTaSanPham;
    public $GiaSanPham;
    public $AnhSanPham;
    public $ThuocTinh;
    public $SoLuongBinhChon;
    public function __construct($idSanPham, $TenSanPham, $MoTaSanPham, $GiaSanPham, $AnhSanPham, $ThuocTinh, $SoLuongBinhChon)
    {
        $this->idSanPham = $idSanPham;
        $this->TenSanPham = $TenSanPham;
        $this->MoTaSanPham = $MoTaSanPham;
        $this->GiaSanPham = $GiaSanPham;
        $this->AnhSanPham = $AnhSanPham;
        $this->ThuocTinh = $ThuocTinh;
        $this->SoLuongBinhChon = $SoLuongBinhChon;
    }
}
?>