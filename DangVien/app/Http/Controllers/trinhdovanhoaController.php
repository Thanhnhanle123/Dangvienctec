<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trinhdovanhoa;
use App\Http\Requests\StorePostRequestTrinhDoVanHoa;
class trinhdovanhoaController extends Controller
{
    //

    private $trinhDoVanHoa;
    public function __construct(trinhdovanhoa $trinhDoVanHoa){
        $this->trinhDoVanHoa = $trinhDoVanHoa;
    }
    public function index(){
        $trinhDoVanHoa = $this->trinhDoVanHoa->paginate(5);
        return view('admin.trinhdovanhoa.index',compact('trinhDoVanHoa'));
    }

    public function store(StorePostRequestTrinhDoVanHoa $request){
        $this->trinhDoVanHoa->firstOrCreate([
            'tenTrinhDo' => $request->tenTrinhDo,
            'maTrinhDo' => $request->maTrinhDo
        ]);
        return redirect()->route('trinhdovanhoa.danhsach');
    }

    public function edit($id){
        $trinhDoVanHoa = $this->trinhDoVanHoa::find($id);
        return view('admin.trinhdovanhoa.edit', compact('trinhDoVanHoa'));
    }

    public function update($id,Request $request){
        $trinhDoVanHoa = $this->trinhDoVanHoa::find($id)->updateOrCreate([
            'tenTrinhDo' => $request->tenTrinhDo,
            'maTrinhDo' => $request->maTrinhDo
        ]);
        return redirect()->route('trinhdovanhoa.danhsach');
    }

    public function delete($id){
        try{
            $trinhDoVanHoa = $this->trinhDoVanHoa::find($id)->delete();
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
