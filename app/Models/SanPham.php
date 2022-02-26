<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function LoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, "loai_san_pham_id");
    }
    public function ChiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'idsanpham');
    }
    public function ChiTietGioHang()
    {
        return $this->hasMany(ChiTietGioHang::class, 'idsanpham');
    }
}
