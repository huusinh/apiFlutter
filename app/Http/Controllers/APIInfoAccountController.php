<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class APIInfoAccountController extends Controller
{
    public function getInfo(Request $request){
        $info=User::where('id','=',$request['id'])->first();
        return response()->json($info, 200);
    }
}
