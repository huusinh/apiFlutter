<?php

namespace App\Http\Controllers;

use App\Models\ChiTietGioHang;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class APIHoaDonController extends Controller
{
    public function getListhoadon(Request $request)
    {
        $dsChiTietHD = HoaDon::where('hoa_dons.idtaikhoan', '=', $request->post('_idtaikhoan'))
            ->with("ChiTietHoaDon") //load theo khoa' ngoai cua CTHoaDon, no tu them vao`
            ->with("ChiTietHoaDon.SanPham")
            ->get("hoa_dons.*");
        if ($request["_TrangThai"] != 0)
            $dsChiTietHD = $dsChiTietHD->where("TrangThai", $request["_TrangThai"]);

        return response()->json($dsChiTietHD, 200);
    }


    public function gethoadonId(Request $request)
    {
        $hoadonId = HoaDon::with('id')->where('idtaikhoan', '=', $request->post('_idtaikhoan'))->max('id');

        return json_encode([
            'id' => $hoadonId,

        ]);
    }
    public function index()
    {
        $hoadon = HoaDon::join('chi_tiet_hoa_dons', 'chi_tiet_hoa_dons.idhoadon', '=', 'hoa_dons.id')->get();

        return json_encode([
            'data' => $hoadon,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kiem tra du lieu
        $validate = Validator::make($request->all(), [
            '_diachi' => ['required'],
            '_sodienthoai' => ['required'],
            '_idtaikhoan' => ['required', 'numeric', 'integer', 'exists:users,id'],
        ]);
        //neu du lieu no' sai thi`tra? ve` loi~
        if ($validate->fails())
            return response()->json($validate->errors(), 400);

        $year =  Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = (int)Carbon::now('Asia/Ho_Chi_Minh')->month;

        if ($month < 10) {
            $month = '0' . $month;
        }
        $day = (int)Carbon::now('Asia/Ho_Chi_Minh')->day;

        if ($day < 10) {
            $day = '0' . $day;
        }
        $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;

        if ($hour < 10) {
            $hour = '0' . $hour;
        }
        $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;

        if ($minute < 10) {
            $minute = '0' . $minute;
        }
        $second = Carbon::now('Asia/Ho_Chi_Minh')->second;

        if ($second < 10) {
            $second = '0' . $second;
        }



        $id = $year . $month . $day . $hour . $minute . $second;
        $hoaDon = HoaDon::create([
            'id' => $id,
            'ngaylap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            'diachi' => $request->post('_diachi'),
            'sodienthoai' => $request->post('_sodienthoai'),
            'ghichu' => $request->post('_ghichu') ?? "",
            'tongtien' => 0,
            'idtaikhoan' => $request->post('_idtaikhoan'),
        ]);

        $dsGioHang = ChiTietGioHang::join('gio_hangs', 'chi_tiet_gio_hangs.idgiohang', 'gio_hangs.id')
            ->where("gio_hangs.iduser", $request["_idtaikhoan"])->get("chi_tiet_gio_hangs.*");

        foreach ($dsGioHang as $item) {
            $thanhTien = $item->soluong * $item->SanPham->price;
            ChiTietHoaDon::create([
                'soluong' => $item->soluong,
                'dongia' => $thanhTien,
                'idsanpham' => $item->idsanpham,
                'idhoadon' => $hoaDon->id,
            ]);
        }

        //neu ko co chi tiet hoa don nao duoc lap thi xoa' luon cai hoa don
        if (empty(ChiTietHoaDon::where('idhoadon', $hoaDon->id)->first())) {
            $hoaDon->forceDelete();
            return response()->json(["Sucssess" => false], 400);
        }
        //nguoc lai thi tinh' thanh` tien` cho hoa' don va` tra? ket qua ve 200
        $hoaDon->tongtien = ChiTietHoaDon::where('idhoadon', $hoaDon->id)->sum('dongia');
        $hoaDon->save();
        $gioHang = GioHang::where("iduser", $request["_idtaikhoan"])->first();
        DB::table('chi_tiet_gio_hangs')->where('idgiohang', $gioHang->id)->delete();

        return response()->json(["Sucssess" => True], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function show(HoaDon $hoadon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HoaDon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HoaDon $hoadon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDon $hoadon)
    {
        //
    }
}
