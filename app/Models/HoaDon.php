<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function ChiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'idhoadon');
    }
}
