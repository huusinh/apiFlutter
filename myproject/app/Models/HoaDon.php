<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function chitiethoadon(){
        return $this->hasMany('App\Models\ChiTietHoaDon');
}
public $timestamps = false;
}
