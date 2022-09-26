<?php
// ==============bài 1===============
interface PhepTinh
{
    function PhepCong();
    function PhepTru();
    function PhepNhan();
    function PhepChia();
}
class TinhToan implements PhepTinh
{
    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function PhepCong()
    {
        return $this->a + $this->b;
    }
    public function PhepTru()
    {
        return $this->a - $this->b;
    }
    public function PhepNhan()
    {
        return $this->a * $this->b;
    }
    public function PhepChia()
    {
        if ($this->a == 0 || $this->b == 0) {
            return "tham số phải >0";
        } else {
            return $this->a / $this->b;
        }
    }
};

$TinhToan = new TinhToan(15, 5);
echo '<pre>';
var_dump($TinhToan->PhepCong());
var_dump($TinhToan->PhepTru());
var_dump($TinhToan->PhepNhan());
var_dump($TinhToan->PhepChia());
// ====================bài 2 =====================


class ConNguoi
{
    function __construct($ten, $tuoi, $gioitinh, $ngaysinh, $canNang, $chieuCao)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->canNang = $canNang;
        $this->chieuCao = $chieuCao;
    }
}

class MonThiDau
{
    public $tenMon;
    public $chieuCao;
    public $canNang;
    public function __construct($tenMon, $chieuCao, $canNang)
    {
        $this->tenMon = $tenMon;
        $this->chieuCao = $chieuCao;
        $this->canNang  = $canNang;
    }
}

class VanDongVien extends ConNguoi
{

    protected $huyChuong;
    protected $cacMonThiDau;
    function __construct($ten, $tuoi, $gioitinh, $ngaysinh, $canNang, $chieuCao, $huyChuong, $cacMonThiDau)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->canNang = $canNang;
        $this->chieuCao = $chieuCao;;
        $this->huyChuong = $huyChuong;
        $this->cacMonThiDau = $cacMonThiDau;
    }

    public function hienThiThongTin()
    {
        $cacMonThiDau = implode("-", $this->cacMonThiDau);
        return "
        Tên : $this->ten <br>
        Giới tính : $this->gioitinh <br>
        Ngày sinh : $this->ngaysinh <br>
        Cân nặng : $this->canNang <br>
        Chiều cao : $this->chieuCao <br>
        Số huy chương : $this->huyChuong <br>
        Tuổi : $this->tuoi <br>
        Các môn đã thi đấu : $cacMonThiDau <br>";
    }
    public function thiDau($monThidau, $soHuyChuong)
    {
        if ($this->chieuCao<$monThidau->chieuCao||$this->canNang<$monThidau->canNang ) {
             $this->huyChuong-=$soHuyChuong;
        }
        return "Tổng số huy chương : $this->huyChuong";
    }
}


$vanDongVien = new VanDongVien("Thanh", 22, "Nam", "14-02-2000", 70, 168, 30, ["chay", "nhay"]);
var_dump($vanDongVien->hienThiThongTin());
$monThidau = new monThiDau("chay",168,77);

var_dump($vanDongVien->thiDau($monThidau,2));