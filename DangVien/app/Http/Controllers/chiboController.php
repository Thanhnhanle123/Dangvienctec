<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chibo;
use App\Imports\ChiBoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePostRequestChiBo;
class chiboController extends Controller
{
    //
    private $chiBo;
    public function __construct(Chibo $chiBo){
        $this->chiBo = $chiBo;
    }

    public function index(){
        $chiBo = $this->chiBo->paginate(5);
        return view('admin.chibo.index',compact('chiBo'));
    }

    public function store(StorePostRequestChiBo $request){
        $this->chiBo::FirstOrCreate([
            'maChiBo' => strtoupper($request->maChiBo),
            'tenChiBo' => ucfirst($request->tenChiBo)
        ]);
        return redirect()->route('chibo.danhsach');
    }

    public function edit($id){
        $chiBo = $this->chiBo->find($id);
        return view('admin.chibo.edit',compact('chiBo'));
    }

    public function update($id,Request $request){
        $chiBo = $this->chiBo::find($id)->update([
            'maChiBo' => strtoupper($request->maChiBo),
            'tenChiBo' => ucfirst($request->tenChiBo)
        ]);
        return redirect()->route('chibo.danhsach');
    }

    public function delete($id){
        try{
            $this->chiBo->find($id)->delete();
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

    public function upload(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file')->store('import/chibo');
            $import = new ChiBoImport;
            $import->import($file);
            return redirect()->route('chibo.danhsach')->with('success', 'Upload Thành công');
        }else{
            return redirect()->route('chibo.danhsach')->with('success', 'File không được bỏ trống!');
        }
    }
}
