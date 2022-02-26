<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    use HasFactory;
    protected $fillable = [
        'idtaikhoan',
        'tennguoinhan',
        'sodienthoai',
        'tinhthanhpho',
        'quanhuyen',
        'phuongxa',
        'diachichitiet',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'idtaikhoan');
    }
}
