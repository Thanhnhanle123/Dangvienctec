<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tongiao;
use App\Imports\TonGiaoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePostRequestTonGiao;
class tongiaoController extends Controller
{
    //

    private $tonGiao;
    public function __construct(Tongiao $tonGiao){
        $this->tonGiao = $tonGiao;
    }
    public function index(){
        $tonGiao = $this->tonGiao->paginate(5);
        return view('admin.tongiao.index',compact('tonGiao'));
    }

    public function store(StorePostRequestTonGiao $request){
        $this->tonGiao->firstOrCreate([
            'maTonGiao' => strtoupper($request->maTonGiao),
            'tenTonGiao' => ucfirst($request->tenTonGiao)
        ]);
        return redirect()->route('tongiao.danhsach');
    }

    public function edit($id){
        $tonGiao = $this->tonGiao::find($id);
        return view('admin.tongiao.edit',compact('tonGiao'));
    }

    public function update($id, Request $request){
        $this->tonGiao->updateOrCreate([
            'maTonGiao' => strtoupper($request->maTonGiao),
            'tenTonGiao' => ucfirst($request->tenTonGiao)
        ]);
        return redirect()->route('tongiao.danhsach');
    }

    public function delete($id){
        try{
            $this->tonGiao->find($id)->delete();
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
            $file = $request->file('file')->store('import/tonGiao');
            $import = new TonGiaoImport;
            $import->import($file);
            return redirect()->route('tongiao.danhsach')->with('success', 'Upload Thành công');
        }else{
            return redirect()->route('tongiao.danhsach')->with('success', 'File không được bỏ trống!');
        }
    }
}
