<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
  // 登陆页面
  public function index()
  {
     return view('login.index');
  }
  //登陆动作
  public function login(Request $request)
  {
    // 数据验证
     $validatedData = $request->validate([
        'username' => 'required|max:32',
        'password' => 'required',
    ]);
    //登陆验证
    if($validatedData){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // 通过认证..
            return redirect()->intended('/');
        }
        return Redirect::back()->withErrors('账号密码不正确');

    }

  }
  /**
  * 登出行为
  */
  public function logout()
  {
    Auth::logout();
    return redirect('/login');
  }

  public function loginAPI(Request $request)
  {
    // 数据验证
    $validatedData = $request->validate([
        'username' => 'required|max:32',
        'password' => 'required',
    ]);

    //登陆验证
    if($validatedData){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // 通过认证..
            
        }
    }
  }
}
