<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinhoc;
use  App\Http\Requests\StorePostRequestTinHoc;
class tinhocController extends Controller
{
    //
    private $tinHoc;
    public function __construct(Tinhoc $tinHoc){
        $this->tinHoc = $tinHoc;
    }

    public function index(){
        $tinHoc = $this->tinHoc->paginate(5);
        return view('admin.tinhoc.index', compact('tinHoc'));
    }

    public function store(StorePostRequestTinHoc $request){
        $this->tinHoc->firstOrCreate([
            'maTinHoc' => $request->maTinHoc,
            'tenTinHoc' => $request->tenTinHoc,
            'loai' => $request->loai
        ]);
        return redirect()->route('tinhoc.danhsach');
    }

    public function edit($id){
        $tinHoc = $this->tinHoc->find($id);
        return view('admin.tinhoc.edit', compact('tinHoc'));
    }

    public function update($id,Request $request){
        $this->tinHoc->find($id)->updateOrCreate([
            'maTinHoc' => $request->maTinHoc,
            'tenTinHoc' => $request->tenTinHoc,
            'loai' => $request->loai
        ]);
        return redirect()->route('tinhoc.danhsach');
    }

    public function delete($id){
        try{
            $this->tinHoc->find($id)->delete();
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
}
