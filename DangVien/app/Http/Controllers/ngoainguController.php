<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ngoaingu;
class ngoainguController extends Controller
{
    //
     private $ngoaiNgu;

     public function __construct(Ngoaingu $ngoaiNgu){
         $this->ngoaiNgu = $ngoaiNgu;
     }

     public function index(){
         $ngoaiNgu =  $this->ngoaiNgu->paginate(5);
         return view('admin.ngoaingu.index',compact('ngoaiNgu'));
     }

     public function store(Request $request){
        $this->ngoaiNgu->firstOrCreate([
            'maNgoaiNgu' => $request->maNgoaiNgu,
            'tenNgoaiNgu' => $request->tenNgoaiNgu,
            'trinhDo' => $request->trinhDo
        ]);
        return redirect()->route('ngoaingu.danhsach');
     }

     public function edit($id){
        $ngoaiNgu = $this->ngoaiNgu->find($id);
        return view('admin.ngoaingu.edit',compact('ngoaiNgu'));
     }

     public function update($id, Request $request){
        $ngoaiNgu = $this->ngoaiNgu->find($id)->updateOrCreate([
            'maNgoaiNgu' => $request->maNgoaiNgu,
            'tenNgoaiNgu' => $request->tenNgoaiNgu,
            'trinhDo' => $request->trinhDo
        ]);
        return redirect()->route('ngoaingu.danhsach');
     }

     public function delete($id){
        try{
            $this->ngoaiNgu->find($id)->delete();
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
