<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dantoc;
use App\Imports\DanTocImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePostRequestDanToc;
class dantocController extends Controller
{
    //
    private $danToc;
    public function __construct(Dantoc $danToc){
        $this->danToc = $danToc;
    }
    public function index(){
        $danToc = $this->danToc->paginate(5);
        return view('admin.dantoc.index',compact('danToc'));
    }

    public function store(StorePostRequestDanToc $request){
        $this->danToc->firstOrCreate([
            'maDanToc' => strtoupper($request->maDanToc),
            'tenDanToc' => ucfirst($request->tenDanToc)
        ]);
        return redirect()->route('dantoc.danhsach');
    }

    public function edit($id){
        $danToc = $this->danToc->find($id);
        return view('admin.dantoc.edit',compact('danToc'));
    }

    public function update($id,Request $request){
        $this->danToc->find($id)->updateOrCreate([
            'maDanToc' => strtoupper($request->maDanToc),
            'tenDanToc' => ucfirst($request->tenDanToc)
        ]);
        return redirect()->route('dantoc.danhsach');
    }

    public function delete($id){
        try{
            $this->danToc->find($id)->delete();
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
            $file = $request->file('file')->store('import/dantoc');
            $import = new DanTocImport;
            $import->import($file);
            return redirect()->route('dantoc.danhsach')->with('success', 'Upload Thành công');
        }else{
            return redirect()->route('dantoc.danhsach')->with('success', 'File không được bỏ trống!');
        }
    }
}
