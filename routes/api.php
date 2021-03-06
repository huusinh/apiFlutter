<?php

use App\Http\Controllers\APIGioHangController;
use App\Http\Controllers\APIInfoAccountController;
use App\Http\Controllers\APIHoaDonController;
use App\Http\Controllers\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('sanpham/ds',[APISanPhamController::class,'layds']);
Route::get('getProductbyProductType/{id}',[APISanPhamController::class,'getProductbyProductType']);
Route::post('addtocart',[APIGioHangController::class,'themspvaogio']);
Route::post('getcart',[APIGioHangController::class,'laygiohang']);
Route::post('deleteproduct',[APIGioHangController::class,'deleteProduct']);
Route::post('updatesoluong',[APIGioHangController::class,'updatesoluong']);

Route::post('getInfoAccount' , [APIInfoAccountController::class , 'getInfo']);
Route::post('getAddressAccount' , [APIInfoAccountController::class , 'getAddress']);
Route::post('updateOrcreateAddressAccount' , [APIInfoAccountController::class , 'updateOrcreateAddress']);

route::get('invoice/getInvoiceList' , [APIHoaDonController::class , 'index']);
route::post('invoice/newInvoice' , [APIHoaDonController::class , 'store']);
route::post('invoice/getInvoiceId' , [APIHoaDonController::class , 'gethoadonId']);
route::post('invoice/getListInvoiceByAccountId',  [APIHoaDonController::class , 'getListhoadon']);
Route::post('gettotal' , [APIGioHangController::class , 'gettotal']);

Route::post('login', [ApiUserController::class, 'login']);
Route::apiResource('User', ApiUserController::class);
Route::post('dangki', [ApiUserController::class, 'dangki']);
Route::post('capnhat/{User}', [ApiUserController::class, 'capnhat']);
