<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietGioHang extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function GioHang()
    {
        return $this->belongsTo(GioHang::class, 'idgiohang');
    }
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'idsanpham');
    }
}
