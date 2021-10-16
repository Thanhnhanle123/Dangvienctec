<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\User;
class loginController extends Controller
{
    //
    public function index(){
        // dd(bcrypt('ThanhNhan12303'));
        return view('admin.login.index');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'userName' => 'required|max:50',
            'password' => 'required|min:6|max:32'
        ],[
            'userName.required' => 'Bạn chưa nhập tên đăng nhập',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 32 ký tự'
        ]);
        if( $validator->fails() ){
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(['userName' => $request->userName, 'password' => $request->password],$remember)) {
            return redirect::to("/admin");
        }else {
            return redirect()->back()->withInput()->withErrors("Tên đăng nhập, mật khẩu không đúng".bcrypt('ThanhNhan12303'));
        }
        return redirect()->back()->withInput();
    }
    public function logout(){
        Auth::logout();
        return view('admin.login.index');
    }
}
