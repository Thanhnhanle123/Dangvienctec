<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chucvu;
use App\Http\Requests\StorePostRequestChucVu;
class chucvuController extends Controller
{
    //
    private $chucVu;

    public function __construct(Chucvu $chucVu){
        $this->chucVu = $chucVu;
    }

    public function index(){
        $chucVu = $this->chucVu::paginate(5);
        return view('admin.chucvu.index',compact('chucVu'));
    }

    public function store(StorePostRequestChucVu $request){
        $this->chucVu->firstOrCreate([
            'maChucVu' => strtoupper($request->maChucVu),
            'tenChucVu' => ucfirst($request->tenChucVu)
        ]);
        return redirect()->route('chucvu.danhsach');
    }

    public function edit($id){
        $chucVu = $this->chucVu->find($id);
        return view('admin.chucvu.edit',compact('chucVu'));
    }

    public function update($id,Request $request){
        $this->chucVu->find($id)->update([
            'maChucVu' => strtoupper($request->maChucVu),
            'tenChucVu' => ucfirst($request->tenChucVu)
        ]);
        return redirect()->route('chucvu.danhsach');
    }

    public function delete($id){
        try{
            $this->chucVu->find($id)->delete();
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
