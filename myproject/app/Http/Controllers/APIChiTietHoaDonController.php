<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDon;
use Illuminate\Http\Request;

class APIChiTietHoaDonController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = new ChiTietHoaDon;
        $detail->fill([
            'id' => $request->post('_id'),
            'soluong' => $request->post('_soluong'),
            'dongia' => $request->post('_dongia'),
            'idsanpham' => $request->post('_idsanpham'),
            'idhoadon' => $request->post('_idhoadon'),       
        ]);
        $detail->save();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChiTietHoaDon  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function show(ChiTietHoaDon $invoice_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChiTietHoaDon  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChiTietHoaDon $invoice_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChiTietHoaDon  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChiTietHoaDon $invoice_detail)
    {
        //
    }
}
