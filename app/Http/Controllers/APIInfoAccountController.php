<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Illuminate\Http\Request;
use App\Models\User;

class APIInfoAccountController extends Controller
{
    public function getInfo(Request $request)
    {
        $info = User::where('id', '=', $request['iduser'])->with("DiaChi")->first();
        return response()->json($info, 200);
    }
    public function getAddress(Request $request)
    {
        $diaChi = DiaChi::where("idtaikhoan", $request["_idtaikhoan"])->first();
        return response()->json($diaChi, 200);
    }
    public function updateOrcreateAddress(Request $request)
    {
        $diaChi = DiaChi::updateOrCreate([
            'idtaikhoan'   =>  $request["idtaikhoan"],
        ], [
            'tennguoinhan' => $request["tennguoinhan"],
            'sodienthoai' => $request["sodienthoai"],
            'tinhthanhpho' => $request["tinhthanhpho"],
            'quanhuyen' => $request["quanhuyen"],
            'phuongxa' => $request["phuongxa"],
            'diachichitiet' => $request["diachichitiet"],
        ]);
        return response()->json($diaChi, 200);
    }
}
