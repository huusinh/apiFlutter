<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function hoadon(){
        return $this->belongsTo('App\Models\HoaDon');
}
public $timestamps = false;
}
