<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstKhachHang = User::all();
        return $lstKhachHang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $acc = User::where('password', $request['password'])
            ->Where(function ($query) use ($request) {
                $query->orwhere('email', $request['email'])
                    ->orwhere('SDT', $request['SDT']);
            })
            ->first();
        if (!empty($acc))
            return response()->json($acc, 200);
        return response()->json([], 404);
    }
    public function dangki(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
        ]);
        if ($validate->fails())
            return response()->json($validate->errors(), 400);
        // co trong database ko thi tao moi ngc lai thi query ra cho minh
        $acc = User::firstOrCreate([
            'name'       => ($request['name']),
            'email'       => ($request['email']),
        ], [
            'password'         => ($request['password']),
            'NgaySinh' => date('Y-m-d H:i:s'),
            'GioiTinh' => 0,
            "SDT" => 0,
            "DiaChi" => "",
            "Quyen" => 0,
            "TrangThai" => 0,
        ]);
        $data = $acc;
        //neu du lieu ko co rong~ thi tra ve voi status la 200
        if (!empty($data))
            return response()->json($data, 200);
    }




    public function capnhat(Request $request, User $User)
    {

        $validate = Validator::make($request->all(), [
            'name' => ["required"],
            //'MatKhau'=>["required"],
            'GioiTinh' => ["boolean"],
            'NgaySinh' => ["date"],
            'DiaChi' => [],
            'email' => ["required", "email"],
            'SDT' => ['required', 'numeric'],


        ]);
        //neu du lieu no' sai thitra? ve loi~
        if ($validate->fails())
            return response()->json($validate->errors(), 400);
        // co trong database ko thi tao moi ngc lai thi query ra cho minh
        $User->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'GioiTinh' => $request['GioiTinh'],
            'NgaySinh' => $request['NgaySinh'],
            'DiaChi' => $request['DiaChi'],
            'SDT' => $request['SDT'],

        ]);
        $User->save();
        //neu du lieu ko co rong~ thi tra ve voi status la 200
        if (!empty($User))
            return response()->json($User, 200);
    }
}
