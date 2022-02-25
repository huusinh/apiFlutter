<?php

namespace App\Http\Controllers;
use App\Models\LoaiSanPham;
//use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $lstLoai=LoaiSanPham::all();
        return view('home',['lstLoai'=>$lstLoai]);
    }
}
