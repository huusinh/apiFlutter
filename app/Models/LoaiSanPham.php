<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }
}
