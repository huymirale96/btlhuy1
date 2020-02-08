<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Staff;
class AuthenticationController extends BaseController
{
    function login(Request $request){
        $request->session()->forget('userNameLogined');
    	return view('authentication/login');
    }

    function postLogin(Request $request)
    {
       //$this->validate($request,['signin-user'=>'requird','signin-passsword'=>'required'],['signin-user.required'=>'Bạn chưa nhập tên người dùng.','signin-password.required'=>'Bạn chưa nhập mật khẩu']);
        
         $arr = [
            'username' => $request->input('signin-user'),
            'password' => $request->input('signin-password'),
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        // dd($arr);
        $request->session()->forget('errorLogin');
        if (Auth::guard('staff')->attempt($arr)) {

           // dd('đăng nhập thành công');
             session(['userNameLogined' => $request->input('signin-user') ]);
              session(['idNameLogined' => Auth::guard('staff')->user()->id]);
            return redirect('dashboard/analytical');
          
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {
             session(['errorLogin' => 'Đăng Nhập Không Thành Công.']);
             return redirect('authentication/login');
            
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    function register(){
    	return view('authentication.register');
    }

    function lockscreen(){
        return view('authentication.lockscreen');
    }

    function forgotPassword(){
    	return view('authentication.forgot-password');
    }
    
    function page404(){
    	return view('authentication.page404');
    }

    function page403(){
        return view('authentication.page403');
    }

    function page500(){
        return view('authentication.page500');
    }

    function page503(){
    	return view('authentication.page503');
    }
}
