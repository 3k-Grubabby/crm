<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $creds = $request->only(['username','password']);
        
        if(!$token = auth()->attempt($creds)){
            return response()->json(['error'=>'username/password is wrong']);
        }
        return response()->json(['token'=>$token]);
    }
}
