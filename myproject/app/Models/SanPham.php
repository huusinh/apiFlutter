<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    public function LoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class);
    }
}
