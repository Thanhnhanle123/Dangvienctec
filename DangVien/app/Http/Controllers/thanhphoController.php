<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thanhpho;
use App\Imports\ThanhPhoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePostRequestThanhPho;
class thanhphoController extends Controller
{
    //
    private $thanhPho;
    public function __construct(Thanhpho $thanhPho){
        $this->thanhPho = $thanhPho;
    }

    public function index(){
        $thanhPho = $this->thanhPho->paginate(5);
        return view('admin.thanhpho.index',compact('thanhPho'));
    }

    public function store(StorePostRequestThanhPho $request){
        $this->thanhPho::FirstOrCreate([
            'maThanhPho' => strtoupper($request->maThanhPho),
            'tenThanhPho' => ucwords($request->tenThanhPho)
        ]);
        return redirect()->route('thanhpho.danhsach');
    }

    public function edit($id){
        $thanhPho = $this->thanhPho->find($id);
        return view('admin.thanhpho.edit',compact('thanhPho'));
    }

    public function update($id,Request $request){
        $thanhPho = $this->thanhPho::find($id)->update([
            'maThanhPho' => strtoupper($request->maThanhPho),
            'tenThanhPho' => ucwords($request->tenThanhPho)
        ]);
        return redirect()->route('thanhpho.danhsach');
    }

    public function delete($id){
        try{
            $this->thanhPho->find($id)->delete();
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
            $file = $request->file('file')->store('import/thanhpho');
            $import = new ThanhPhoImport;
            $import->import($file);
            return redirect()->route('thanhpho.danhsach')->with('success', 'Upload Thành công');
        }else{
            return redirect()->route('thanhpho.danhsach')->with('success', 'Upload không thành công');
        }


    }
}
