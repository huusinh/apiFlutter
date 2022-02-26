<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function SanPham()
    {
        return $this->hasMany(SanPham::class, "loai_san_pham_id");
    }
}
