<?php
class ob_HoaDon{
    public $idSanPham;
    public $TenSanPham;
    public $MoTaSanPham;
    public $GiaSanPham;
    public $AnhSanPham;
    public $ThuocTinh;
    public $SoLuong;

    public function __construct($idSanPham, $TenSanPham, $MoTaSanPham, $GiaSanPham, $AnhSanPham, $ThuocTinh, $SoLuong)
    {
        $this->idSanPham = $idSanPham;
        $this->TenSanPham = $TenSanPham;
        $this->MoTaSanPham = $MoTaSanPham;
        $this->GiaSanPham = $GiaSanPham;
        $this->AnhSanPham = $AnhSanPham;
        $this->ThuocTinh = $ThuocTinh;
        $this->SoLuong = $SoLuong;
    }

}
?>