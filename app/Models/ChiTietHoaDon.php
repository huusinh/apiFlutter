<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function HoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'idhoadon');
    }
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'idsanpham');
    }
}
