<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
class APISanPhamController extends Controller
{
    function layds(){
        $ds=SanPham::all();
        if (!empty($ds))
            return response()->json($ds, 200);
        return response()->json(["Error"=>"Item Not found"],404);
    }
    function getProductbyProductType($id){
        $ds=SanPham::where('loai_san_pham_id','=',$id)-> get();
        if (!empty($ds))
            return response()->json($ds, 200);
        return response()->json(["Error"=>"Item Not found"],404);
    }
    

}
