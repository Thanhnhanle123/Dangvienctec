<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function index(Request $request){
        $cauHoi = $request->input('message');
        $string = ucfirst($cauHoi);
        $array = explode(' ', $string);//Không cân thay đổi
        $mang = [
        'tộc','dantoc.danhsach',
        'giáo','tongiao.danhsach',
        'xuất','logout',
        'chủ','trangchu',
        'hóa','trinhdovanhoa.danhsach',
        'ngữ','ngoaingu.danhsach',
        'học','tinhoc.danhsach',
        'vụ','chucvu.danhsach',
        'phố','thanhpho.danhsach',
        'bộ','chibo.danhsach',
        'trị','quantrivien.danhsach',
        'đảng','dangvien.danhsach',
        'Đảng','dangvien.danhsach',
        'đi','dangvienchuyendi.danhsach',
        'giờ','giờ',
        'ngày','ngày'
        ];
        $callback = $this->request($array,$mang);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if($callback == 'giờ'){
            return redirect()->back()->withInput()->withErrors('bây giờ là: '.$dt->toTimeString());
        }elseif ($callback == 'ngày') {
            return redirect()->back()->withInput()->withErrors('Hôm nay '.$dt->toDateString());
        }elseif ( !empty($callback) ){
            return redirect()->route($callback);
        }else{
            return redirect()->back()->withInput()->withErrors("Không tìm thấy !!");
        }
    }

    public function request($array,$mang){
        foreach ($array as $arr) {
            foreach ($mang as $m) {
                if($arr == $m){
                    $dieuKien[] = $m;
                }
            }
        }
        if(!empty($dieuKien)){
            $giaTri = $dieuKien[count($dieuKien)-1];
            $vitri = $this->vitri_arr($mang,$giaTri);
            return $mang[$vitri+1];
        }
    }

    public function vitri_arr($mang,$giaTri){
        for ($i=0; $i < count($mang); $i++){
           if($mang[$i] == $giaTri){
                 return  $i;
           }
        }
    }
}
