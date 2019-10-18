<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function self()
    {


        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
           return response()->json(['error'=>$e->getMessage()]);
        }
        return $user->tasks;
    }
    
    public function store(Request $request)
    {
   
        $details = $request->only(['taskName']);
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
           return response()->json(['error'=>$e->getMessage()]);
        }
        $post  = $user->tasks()->create($details);

        return $post;
    }
}
