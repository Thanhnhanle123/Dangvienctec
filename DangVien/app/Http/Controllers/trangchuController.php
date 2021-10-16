<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class trangchuController extends Controller
{
    public function index(){
        $dangVien = DB::select('select count(id) as dem from dangviens where deleted_at is null');
        $dangVienChuyenDi = DB::select('select count(dangviens.id) as dem from dangviens,dangvienchuyendis where dangviens.id = dangvienchuyendis.dangVien_ma AND deleted_at is not null');
        $quanTriVien = DB::select('select count(id) as dem from quantriviens');
        $chiBo = DB::select('select count(id) as dem from chiBos');
        if(empty($dangVien)){
            $dangVien = 0;
        }
        if(empty($dangVienChuyenDi)){
            $dangVienChuyenDi = 0;
        }
        if(empty($quanTriVien)){
            $quanTriVien = 0;
        }
        if(empty($quanTriVien)){
            $quanTriVien = 0;
        }
        return view('admin.trangchu.index',compact('dangVien','dangVienChuyenDi','quanTriVien','chiBo'));
    }
}
