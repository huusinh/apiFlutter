<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class APIHoaDonController extends Controller
{
    public function getListhoadon (Request $request){
        $hoadon = HoaDon::join('chi_tiet_hoa_dons' , 'chi_tiet_hoa_dons.id' , '=' , 'hoa_dons.id')->join('san_phams' , 'san_phams.id' ,'=' , 'chi_tiet_hoa_dons.idsanpham')
        ->where('idtaikhoan' , '=' , $request->post('_idtaikhoan'))->select('hoa_dons.id', 'hoa_dons.tongtien', 'hoa_dons.idtaikhoan' , 'chi_tiet_hoa_dons.*' , 'san_phams.tittle' , 'san_phams.image' )->get();
        
        return json_encode ([
            'data' => $hoadon,
        ]);
    }
    

    public function gethoadonId (Request $request)
    {
        $hoadonId = HoaDon::with('id')->where('idtaikhoan' , '=' , $request->post('_idtaikhoan'))->max('id');
        
        return json_encode([
            'id' => $hoadonId,
            
        ]);
    }
    public function index()
    {
        $hoadon = HoaDon::join('chi_tiet_hoa_dons' , 'chi_tiet_hoa_dons.idhoadon' , '=' , 'hoa_dons.id')->get();
        
        return json_encode ([
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
        $year =  Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = (int)Carbon::now('Asia/Ho_Chi_Minh')->month;
        
        if( $month < 10) 
        {
            $month = '0'.$month;
        }
        $day = (int)Carbon::now('Asia/Ho_Chi_Minh')->day;
        
        if($day < 10)
        {
            $day = '0'.$day;
        }
        $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;
        
        if( $hour < 10) 
        {
            $hour = '0'.$hour;
        }
        $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;
        
        if( $minute < 10) 
        {
            $minute = '0'.$minute;
        }
        $second = Carbon::now('Asia/Ho_Chi_Minh')->second;
        
        if( $second < 10) 
        {
            $second = '0'.$second;
        }
       
        
        
        $id = $year.$month.$day.$hour.$minute.$second;
        $hoadon = new HoaDon;
        $hoadon->fill([
         'id' => $id,
         'ngaylap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
         'diachi' => $request->post('_diachi'),
         'sodienthoai' => $request->post('_sodienthoai'),
         'ghichu' => $request->post('_ghichu'),
         'tongtien' => $request->post('_tongtien'),
         'idtaikhoan' => $request->post('_idtaikhoan'),
        ]);
        $hoadon->save();
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
