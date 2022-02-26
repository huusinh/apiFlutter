<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function ChiTietGioHang()
    {
        return $this->hasMany(ChiTietGioHang::class, 'idgiohang');
    }
}
