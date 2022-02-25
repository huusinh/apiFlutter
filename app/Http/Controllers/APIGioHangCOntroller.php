<?php

namespace App\Http\Controllers;
use App\Models\ChiTietGioHang;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIGioHangController extends Controller
{
    function themspvaogio(Request $request)
    {
        $giohang = GioHang::where('iduser', '=', $request['iduser'])->first();
        if (empty($giohang)) {
            DB::table('gio_hangs')->insert([
                'iduser' => $request['iduser']
            ]);
            $giohang = GioHang::where('iduser', '=', $request['iduser'])->first();
            if (
                DB::table('chi_tiet_gio_hangs')->insert([
                    'idgiohang' => $giohang->id,
                    'idsanpham' => $request['idsanpham'],
                    'soluong' => 1
                ]) == true
            ) {
                return response()->json(1, 200);
            }
            return response()->json(0, 404);
        } else {
            $ktra = DB::table('chi_tiet_gio_hangs')->where('idsanpham', '=', $request['idsanpham'])->first();
            if (empty($ktra)) {
                if (
                    DB::table('chi_tiet_gio_hangs')->insert([
                        'idgiohang' => $giohang->id,
                        'idsanpham' => $request['idsanpham'],
                        'soluong' => 1
                    ]) == true
                ) {
                    return response()->json(1, 200);
                }
                return response()->json(0, 404);
            } else {
                if (DB::table('chi_tiet_gio_hangs')->where('idsanpham', '=', $request['idsanpham'])->update([
                    'soluong' => $ktra->soluong + 1
                ]) == true) {
                    // DB::table('chi_tiet_gio_hangs')->where('idsanpham','=',$request['idsanpham'])->save();
                    return response()->json(1, 200);
                }

                return response()->json(0, 404);
            }
        }
    }
    function laygiohang(Request $request)
    {
        $ds = GioHang::join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.idgiohang', '=', 'gio_hangs.id')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.idsanpham')
            ->where('gio_hangs.iduser', '=', $request['iduser'])
            ->select('san_phams.image', 'san_phams.tittle', 'san_phams.price', 'chi_tiet_gio_hangs.idsanpham', 'chi_tiet_gio_hangs.id', 'chi_tiet_gio_hangs.soluong')
            ->get();
        return response()->json($ds, 200);
    }
    function deleteProduct(Request $request){
        $prodetail=ChiTietGioHang::where('id','=',$request['idchitietgiohang'])->first();
        
       if( $prodetail->delete()){
        return response()->json(1 , 200);
       }
       return response()->json(0 , 404);
    }
    function updatesoluong(Request $request){
        $prodetail=ChiTietGioHang::where('id','=',$request['idchitietgiohang'])->first();
        if($request['capnhat']=='1')
        {
            if (DB::table('chi_tiet_gio_hangs')->where('id', '=', $request['idchitietgiohang'])->update([
                'soluong' => $prodetail->soluong + 1
            ]) == true) {
                // DB::table('chi_tiet_gio_hangs')->where('idsanpham','=',$request['idsanpham'])->save();
                return response()->json(1, 200);
            }
        }
        else {
            if (DB::table('chi_tiet_gio_hangs')->where('id', '=', $request['idchitietgiohang'])->update([
                'soluong' => $prodetail->soluong - 1
            ]) == true) {
                // DB::table('chi_tiet_gio_hangs')->where('idsanpham','=',$request['idsanpham'])->save();
                return response()->json(1, 200);
            }
        }
        return response()->json(0 , 404);
    }
    function gettotal(Request $request){
        $tongtien=0;
        $total=GioHang::join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.idgiohang', '=', 'gio_hangs.id')
        ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.idsanpham')
        ->where('gio_hangs.iduser', '=', $request['iduser'])
        ->select('san_phams.price','chi_tiet_gio_hangs.soluong')
        ->get();
        for( $i=0;$i<count($total);$i++)
        {
            $tongtien+=$total[$i]->soluong*$total[$i]->price;
        }
    return response()->json($tongtien, 200);
    }
}
