<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\User;

class quantrivienController extends Controller
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $user = $this->user->paginate(5);
        return view('admin.quantrivien.index',compact('user'));
    }

    public function store(Request $request){
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
            return redirect()
                        ->route('quantrivien.danhsach')
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->hasFile('file_anh')){
            $file = $request->file_anh;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = Storage::url($request->file('file_anh')->storeAs('public/quantrivien/'.auth()->id(),$fileNameHash));
        }else{
            $fileNameOrigin = Null;
            $filePath = Null;
        }
        if($request->method('post')){
            $this->user->FirstOrCreate([
                'userName' =>  $request->userName,
                'password' =>  bcrypt($request->password),
                'password_show' => $request->password,
                'tenNguoiDung' => $request->tenNguoiDung,
                'file_name' => $fileNameOrigin,
                'file_path' => $filePath,
            ]);
            return redirect()->route('quantrivien.danhsach');
        }
    }

    public function edit($id){
        $user = $this->user->find($id);
        return view('admin.quantrivien.edit',compact('user'));
    }

    public function update($id,Request $request){
        if($request->hasFile('file_anh')){
            $file = $request->file_anh;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = Storage::url($request->file('file_anh')->storeAs('public/quantrivien/'.auth()->id(),$fileNameHash));
        }else{
            $fileNameOrigin = $this->user->find($id)->file_name;
            $filePath = $this->user->find($id)->file_path;
        }
        if($request->method('post')){
            $this->user->find($id)->update([
                'userName' =>  $request->userName,
                'password' =>  bcrypt($request->password),
                'password_show' => $request->password,
                'tenNguoiDung' => $request->tenNguoiDung,
                'file_name' => $fileNameOrigin,
                'file_path' => $filePath,
            ]);
            return redirect()->route('quantrivien.danhsach');
        }
    }

    public function delete($id){
        try{
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }catch(\Exception $exception){
            Log::error("message". $exception->getMessage(). " --- Line : ". $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }

    public function info($id){
        $user = $this->user->edit($id);
        return view('admin.quantrivien.info',compact('user'));
    }
}
