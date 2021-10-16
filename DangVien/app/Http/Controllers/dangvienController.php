<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use App\components\recursive;
use App\Models\Dantoc;
use App\Models\Tongiao;
use App\Models\Trinhdovanhoa;
use App\Models\Ngoaingu;
use App\Models\Tinhoc;
use App\Models\Chucvu;
use App\Models\Dangvien;
use App\Models\CCCD;
use App\Models\Chibo;
use App\Models\Thanhpho;
use App\Models\Dangvienchuyendi;
use App\Http\Requests\StorePostDangVien;
class dangvienController extends Controller
{
    //
    private $danToc;
    private $tonGiao;
    private $trinhDoVanHoa;
    private $ngoaiNgu;
    private $tinHoc;
    private $chucVu;
    private $dangVien;
    private $cccd;
    private $chiBo;
    private $dangVienChuyenDi;
    private $thanhPho;
    public function __construct(
        Dantoc $danToc,Tongiao $tonGiao, Trinhdovanhoa $trinhDoVanHoa,
        Ngoaingu $ngoaiNgu , Tinhoc $tinHoc, Chucvu $chucVu, Dangvien $dangVien,
        CCCD $cccd,Chibo $chiBo, Dangvienchuyendi $dangVienChuyenDi, Thanhpho $thanhPho
    ){
        $this->danToc = $danToc;
        $this->tonGiao = $tonGiao;
        $this->trinhDoVanHoa = $trinhDoVanHoa;
        $this->ngoaiNgu = $ngoaiNgu;
        $this->tinHoc = $tinHoc;
        $this->chucVu = $chucVu;
        $this->dangVien = $dangVien;
        $this->cccd = $cccd;
        $this->chiBo = $chiBo;
        $this->dangVienChuyenDi = $dangVienChuyenDi;
        $this->thanhPho = $thanhPho;
    }

    public function search(Request $request){
        $danToc = DB::select('select * from dantocs where maDanToc = ?', [$request->danToc_ma]);
        $danTocs = (!empty($danToc)) ? $danToc[0] : [];
        $danToc_ma = $this->sql_search($danTocs,$value = 'maDanToc');

        $tonGiao = DB::select('select * from tongiaos where maTonGiao = ?', [$request->tonGiao_ma]);
        $tonGiaos = (!empty($tonGiao)) ? $tonGiao[0] : [];
        $tonGiao_ma = $this->sql_search($tonGiaos,$value = 'maTonGiao');


        $trinhDoVanHoa = DB::select('select * from trinhdovanhoas where maTrinhDo = ?', [$request->trinhDoVanHoa_ma]);
        $trinhDoVanHoas = (!empty($trinhDoVanHoa)) ? $trinhDoVanHoa[0] : [];
        $trinhDoVanHoa_ma = $this->sql_search($trinhDoVanHoas,$value = 'maTrinhDo');

        $ngoaiNgu = DB::select('select * from ngoaingus where maNgoaiNgu = ?', [$request->ngoaiNgu_ma]);
        $ngoaiNgus = (!empty($ngoaiNgu)) ? $ngoaiNgu[0] : [];
        $ngoaiNgu_ma = $this->sql_search($ngoaiNgus,$value = 'maNgoaiNgu');

        $tinHoc = DB::select('select * from tinhocs where maTinHoc = ?', [$request->tinHoc_ma]);
        $tinHocs = (!empty($tinHoc)) ? $tinHoc[0] : [];
        $tinHoc_ma = $this->sql_search($tinHocs,$value = 'maTinHoc');

        $chucVu = DB::select('select * from chucvus where maChucVu = ?', [$request->chucVu_ma]);
        $chucVus = (!empty($chucVu)) ? $chucVu[0] : [];
        $chucVu_ma = $this->sql_search($chucVus,$value = 'maChucVu');

        $chiBo = DB::select('select * from chibos where maChiBo = ?', [$request->chiBo_ma]);
        $chiBos = (!empty($chiBo)) ? $chiBo[0] : [];
        $chiBo_ma = $this->sql_search($chiBos,$value = 'maChiBo');

        $noiSinh = DB::select('select * from thanhphos where maThanhPho = ?', [$request->noiSinh_ma]);
        $noiSinhs = (!empty($noiSinh)) ? $noiSinh[0] : [];
        $noiSinh_ma = $this->sql_search($noiSinhs,$value = 'maThanhPho');

        $queQuan = DB::select('select * from thanhphos where maThanhPho = ?', [$request->queQuan_ma]);
        $queQuans = (!empty($queQuan)) ? $queQuan[0] : [];
        $queQuan_ma = $this->sql_search($queQuans,$value = 'maThanhPho');


        $namHienTai = now()->year;
        $tuoi = $request->tuoi_value;
        $tuoi_value = $this->sql_tuoi($tuoi);

        $dangVien = $this->dangVien
        ->where('queQuan_ma',$queQuan_ma[0],$queQuan_ma[1])

        ->where('noiSinh_ma',$noiSinh_ma[0],$noiSinh_ma[1])

        ->where('danToc_ma',$danToc_ma[0],$danToc_ma[1])

        ->where('tonGiao_ma',$tonGiao_ma[0],$tonGiao_ma[1])

        ->where('trinhDoVanHoa_ma',$trinhDoVanHoa_ma[0],$trinhDoVanHoa_ma[1])

        ->where('ngoaiNgu_ma',$ngoaiNgu_ma[0],$ngoaiNgu_ma[1])

        ->where('tinHoc_ma',$tinHoc_ma[0],$tinHoc_ma[1])

        ->where('chucVu_ma',$chucVu_ma[0],$chucVu_ma[1])

        ->where('chiBo_ma',$chiBo_ma[0],$chiBo_ma[1])

        ->whereyear('ngaySinh',$tuoi_value[2],$namHienTai-$tuoi_value[0])

        ->whereyear('ngaySinh',$tuoi_value[3],$namHienTai-$tuoi_value[1])->get();

        $cccd = $this->cccd->all();
        $danToc = $this->danToc->all();
        $tonGiao = $this->tonGiao->all();
        $trinhDoVanHoa = $this->trinhDoVanHoa->all();
        $ngoaiNgu = $this->ngoaiNgu->all();
        $tinHoc = $this->tinHoc->all();
        $chucVu = $this->chucVu->all();
        $chiBo = $this->chiBo->all();
        $thanhPho = $this->thanhPho->all();
        $tuoiDangVien = $tuoi_value[0];

        $htmlOptionDantoc = $this->getOption($danToc, $ma = 'maDanToc', $value = '',$name = 'tenDanToc',$danToc_ma[1]);

        $htmlOptionTonGiao = $this->getOption($tonGiao, $ma = 'maTonGiao', $value = '',$name = 'tenTonGiao',$dk = $tonGiao_ma[1]);

        $htmlOptionTrinhDoVanHoa = $this->getOption($trinhDoVanHoa, $ma = 'maTrinhDo', $value = '',$name = 'tenTrinhDo',$dk = $trinhDoVanHoa_ma[1]);

        $htmlOptionNgoaiNgu = $this->getOption($ngoaiNgu, $ma = 'maNgoaiNgu', $value = 'tenNgoaiNgu',$name = 'trinhDo',$dk = $ngoaiNgu_ma[1]);

        $htmlOptionTinHoc = $this->getOption($tinHoc, $ma = 'maTinHoc', $value = 'tenTinHoc',$name = 'loai',$dk = $tinHoc_ma[1]);

        $htmlOptionChucVu = $this->getOption($chucVu, $ma = 'maChucVu', $value = '',$name = 'tenChucVu',$dk =  $chucVu_ma[1]);

        $htmlOptionChiBo = $this->getOption($chiBo, $ma = 'maChiBo', $value = '',$name = 'tenChiBo',$dk =  $chiBo_ma[1] );

        $htmlOptionNoiSinh = $this->getOption($thanhPho, $ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = $noiSinh_ma[1]);

        $htmlOptionQueQuan = $this->getOption($thanhPho, $ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = $queQuan_ma[1]);

        return view('admin.dangvien.search',compact(
            'dangVien',
            'cccd',
            'danToc',
            'tonGiao',
            'trinhDoVanHoa',
            'ngoaiNgu',
            'tinHoc',
            'chucVu',
            'tuoi',
            'chiBo',
            'thanhPho',
            'tuoiDangVien',
            'htmlOptionDantoc',
            'htmlOptionTonGiao',
            'htmlOptionTrinhDoVanHoa',
            'htmlOptionNgoaiNgu',
            'htmlOptionTinHoc',
            'htmlOptionChucVu',
            'htmlOptionChiBo',
            'htmlOptionNoiSinh',
            'htmlOptionQueQuan'
        ));
    }

    public function sql_search($name,$value){
        if($name == null){
            $dau = '<>';
            $giaTri = null;
        }else {
            $dau = '=';
            $giaTri = $name->$value;
        }
        return $giatriMang = [$dau,$giaTri];
    }

    public function sql_tuoi($tuoi_value){
        switch ($tuoi_value) {
            case 1:
                $tuoiNhoNhat = 18;
                $tuoiLonNhat = 30;
                $dauBe = '<=';
                $dauLon = '>';
                break;
            case 2:
                $tuoiNhoNhat = 31;
                $tuoiLonNhat = 40;
                $dauBe = '<=';
                $dauLon = '>';
                break;
            case 3:
                $tuoiNhoNhat = 40;
                $tuoiLonNhat = 50;
                $dauBe = '<=';
                $dauLon = '>';
                break;
            case 4:
                $tuoiNhoNhat = 51;
                $tuoiLonNhat = 60;
                $dauBe = '<=';
                $dauLon = '>';
                break;
            case 5:
                $tuoiNhoNhat = 61;
                $tuoiLonNhat = null;
                $dauBe = '<=';
                $dauLon = '<>';
                break;
            default:
                $tuoiNhoNhat = null;
                $tuoiLonNhat = null;
                $dauBe = '<>';
                $dauLon = '<>';
                break;
        }

        return $query_tuoi = [$tuoiNhoNhat,$tuoiLonNhat,$dauBe,$dauLon];
    }

    public function index(){
        $dangVien = $this->dangVien->all();
        $cccd = $this->cccd->all();
        $danToc = $this->danToc->all();
        $tonGiao = $this->tonGiao->all();
        $trinhDoVanHoa = $this->trinhDoVanHoa->all();
        $ngoaiNgu = $this->ngoaiNgu->all();
        $tinHoc = $this->tinHoc->all();
        $chucVu = $this->chucVu->all();
        $chiBo = $this->chiBo->all();
        $thanhPho = $this->thanhPho->all();

        $htmlOptionDantoc = $this->getOption($danToc,$ma = 'maDanToc', $value = '',$name = 'tenDanToc',$dk = '');

        $htmlOptionTonGiao = $this->getOption($tonGiao,$ma = 'maTonGiao', $value = '',$name = 'tenTonGiao',$dk = '');

        $htmlOptionTrinhDoVanHoa = $this->getOption($trinhDoVanHoa,$ma = 'maTrinhDo', $value = '',$name = 'tenTrinhDo',$dk = '');

        $htmlOptionNgoaiNgu = $this->getOption($ngoaiNgu,$ma = 'maNgoaiNgu', $value = 'tenNgoaiNgu',$name = 'trinhDo',$dk = '');

        $htmlOptionTinHoc = $this->getOption($tinHoc,$ma = 'maTinHoc', $value = 'tenTinHoc',$name = 'loai',$dk = '');

        $htmlOptionChucVu = $this->getOption($chucVu,$ma = 'maChucVu', $value = '',$name = 'tenChucVu',$dk = '');

        $htmlOptionChiBo = $this->getOption($chiBo,$ma = 'maChiBo', $value = '',$name = 'tenChiBo',$dk = '');

        $htmlOptionNoiSinh = $this->getOption($thanhPho,$ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = '');

        $htmlOptionQueQuan = $this->getOption($thanhPho,$ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = '');


        return view('admin.dangvien.index',compact(
            'dangVien',
            'cccd',
            'danToc',
            'tonGiao',
            'trinhDoVanHoa',
            'ngoaiNgu',
            'tinHoc',
            'chucVu',
            'chiBo',
            'thanhPho',
            'htmlOptionDantoc',
            'htmlOptionTonGiao',
            'htmlOptionTrinhDoVanHoa',
            'htmlOptionNgoaiNgu',
            'htmlOptionTinHoc',
            'htmlOptionChucVu',
            'htmlOptionChiBo',
            'htmlOptionNoiSinh',
            'htmlOptionQueQuan'
        ));
    }

    public function getOption($table ,$ma, $value , $name,$dk){
        $Recursive = new recursive($table); // lấy data từ category chèn vào class RecursiveCategory App\component\RecursiveCategory
        $htmlOption = $Recursive->RecursiveOption($ma, $value , $name ,$dk);
        return $htmlOption;
    }
    public function create(){
        $danTocOption = $this->danToc->all();
        $htmlOptionDantoc = $this->getOption($danTocOption,$ma = 'maDanToc' , $value = '',$name = 'tenDanToc',$dk = '');

        $tonGiaoOption = $this->tonGiao->all();
        $htmlOptionTonGiao = $this->getOption($tonGiaoOption, $ma = 'maTonGiao' , $value = '',$name = 'tenTonGiao',$dk = '');

        $trinhDoVanHoaOption = $this->trinhDoVanHoa->all();
        $htmlOptionTrinhDoVanHoa = $this->getOption($trinhDoVanHoaOption, $ma = 'maTrinhDo' , $value = '',$name = 'tenTrinhDo',$dk = '');

        $ngoaiNguOption = $this->ngoaiNgu->all();
        $htmlOptionNgoaiNgu = $this->getOption($ngoaiNguOption, $ma = 'maNgoaiNgu' , $value = 'tenNgoaiNgu',$name = 'trinhDo',$dk = '');

        $tinHocOption = $this->tinHoc->all();
        $htmlOptionTinHoc = $this->getOption($tinHocOption, $ma = 'maTinHoc' , $value = 'tenTinHoc',$name = 'loai',$dk = '');

        $chucVuOption = $this->chucVu->all();
        $htmlOptionChucVu = $this->getOption($chucVuOption, $ma = 'maChucVu' , $value = '',$name = 'tenChucVu',$dk = '');

        $chiBoOption = $this->chiBo->all();
        $htmlOptionChiBo = $this->getOption($chiBoOption, $ma = 'maChiBo' , $value = '',$name = 'tenChiBo',$dk = '');

        $noiSinhOption = $this->thanhPho->all();
        $htmlOptionNoiSinh = $this->getOption($noiSinhOption, $ma = 'maThanhPho' , $value = '',$name = 'tenThanhPho',$dk = '');

        $queQuanOption = $this->thanhPho->all();
        $htmlOptionQueQuan = $this->getOption($queQuanOption, $ma = 'maThanhPho' , $value = '',$name = 'tenThanhPho',$dk = '');
        return view('admin.dangvien.create',compact(
            'htmlOptionDantoc',
            'htmlOptionTonGiao',
            'htmlOptionTrinhDoVanHoa',
            'htmlOptionNgoaiNgu',
            'htmlOptionTinHoc',
            'htmlOptionChucVu',
            'htmlOptionChiBo',
            'htmlOptionNoiSinh',
            'htmlOptionQueQuan'
        ));
    }

    public function store(StorePostDangVien $request){
        $maDangVien = $request->maDangVien;
        $hoLot = $request->hoLot;
        $ten = $request->ten;
        $tenGoiKhac = $request->tenGoiKhac;
        $gioiTinh = $request->gioiTinh;
        $ngaySinh = $request->ngaySinh;
        $noiSinh_ma = $request->noiSinh_ma;
        $CCCD = $request->CCCD;
        $ngayCap = $request->ngayCap;
        $noiCap = $request->noiCap;
        $danToc_ma = $request->danToc_ma;
        $tonGiao_ma = $request->tonGiao_ma;
        $queQuan = $request->queQuan_ma;
        $diaChiThuongTru = $request->diaChiThuongTru;
        $noiOHienTai = $request->noiOHienTai;
        $dienThoaiCoQuan = $request->dienThoaiCoQuan;
        $dienThoaiNha = $request->dienThoaiNha;
        $dienThoaiCaNhan = $request->dienThoaiCaNhan;
        $email = $request->email;
        $tinhTrangHonNhan = $request->tinhTrangHonNhan;
        $thanhPhanXuatThan = $request->thanhPhanXuatThan;
        $dienUuTien = $request->dienUuTien;
        $nangKhieu = $request->nangKhieu;
        $soTruong = $request->soTruong;
        $tinhTrangSucKhoe = $request->tinhTrangSucKhoe;
        $khuyetTat = $request->khuyetTat;
        $trinhDoVanHoa_ma = $request->trinhDoVanHoa_ma;
        $ngoaiNgu_ma = $request->ngoaiNgu_ma;
        $tinHoc_ma = $request->tinHoc_ma;
        $chucVu_ma = $request->chucVu_ma;
        $chiBo_ma = $request->chiBo_ma;

        $cccd = $this->cccd->firstOrCreate([
            'CCCD' => $CCCD,
            'ngayCap' => $ngayCap,
            'noiCap' => $noiCap
        ]);

        $this->dangVien->firstOrCreate([
            'maDangVien' => $maDangVien,
            'hoLot' => $hoLot,
            'ten' => $ten,
            'tenGoiKhac' => $tenGoiKhac,
            'gioiTinh' => $gioiTinh,
            'ngaySinh' => $ngaySinh,
            'noiSinh_ma' => $noiSinh_ma,
            'CCCD_id' => $cccd->id,
            'danToc_ma' => $danToc_ma,
            'tonGiao_ma' => $tonGiao_ma,
            'queQuan_ma' => $queQuan,
            'diaChiThuongTru' => $diaChiThuongTru,
            'noiOHienTai' => $noiOHienTai,
            'dienThoaiCoQuan' => $dienThoaiCoQuan,
            'dienThoaiNha' => $dienThoaiNha,
            'dienThoaiCaNhan' => $dienThoaiCaNhan,
            'email' => $email,
            'tinhTrangHonNhan' => $tinhTrangHonNhan,
            'thanhPhanXuatThan' => $thanhPhanXuatThan,
            'dienUuTien' => $dienUuTien,
            'nangKhieu' => $nangKhieu,
            'soTruong' => $soTruong,
            'tinhTrangSucKhoe' => $tinhTrangSucKhoe,
            'khuyetTat' => $khuyetTat,
            'trinhDoVanHoa_ma' => $trinhDoVanHoa_ma,
            'ngoaiNgu_ma' => $ngoaiNgu_ma,
            'tinHoc_ma' => $tinHoc_ma,
            'chucVu_ma' => $chucVu_ma,
            'chiBo_ma' => $chiBo_ma
        ]);
    return redirect()->route('dangvien.danhsach');
    }

    public function edit($id){
        $dangVien = $this->dangVien->find($id);
        $danTocOption = $this->danToc->all();
        $htmlOptionDantoc = $this->getOption($danTocOption,$ma = 'maDanToc' , $value = '',$name = 'tenDanToc',$dk = $dangVien->danToc_ma);

        $tonGiaoOption = $this->tonGiao->all();
        $htmlOptionTonGiao = $this->getOption($tonGiaoOption, $ma = 'maTonGiao', $value = '',$name = 'tenTonGiao',$dk = $dangVien->tonGiao_ma);

        $trinhDoVanHoaOption = $this->trinhDoVanHoa->all();
        $htmlOptionTrinhDoVanHoa = $this->getOption($trinhDoVanHoaOption, $ma = 'maTrinhDo', $value = '',$name = 'maTrinhDo',$dk = $dangVien->trinhDoVanHoa_ma);

        $ngoaiNguOption = $this->ngoaiNgu->all();
        $htmlOptionNgoaiNgu = $this->getOption($ngoaiNguOption, $ma = 'maNgoaiNgu', $value = 'tenNgoaiNgu',$name = 'trinhDo',$dk = $dangVien->ngoaiNgu_ma);

        $tinHocOption = $this->tinHoc->all();
        $htmlOptionTinHoc = $this->getOption($tinHocOption, $ma = 'maTinHoc', $value = 'tenTinHoc',$name = 'loai',$dk = $dangVien->tinHoc_ma);

        $chucVuOption = $this->chucVu->all();
        $htmlOptionChucVu = $this->getOption($chucVuOption, $ma = 'maChucVu', $value = '',$name = 'tenChucVu',$dk = $dangVien->chucVu_ma);

        $cccd = $this->cccd->find($dangVien->CCCD_id);

        $chiBoOption = $this->chiBo->all();
        $htmlOptionChiBo = $this->getOption($chiBoOption, $ma = 'maChiBo', $value = '',$name = 'tenChiBo',$dk = $dangVien->chiBo_ma);

        $noiSinhOption = $this->thanhPho->all();
        $htmlOptionNoiSinh = $this->getOption($noiSinhOption, $ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = $dangVien->noiSinh_ma);

        $queQuanOption = $this->thanhPho->all();
        $htmlOptionQueQuan = $this->getOption($queQuanOption, $ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = $dangVien->queQuan_ma);
        return view('admin.dangvien.edit',compact(
            'dangVien',
            'htmlOptionDantoc',
            'htmlOptionTonGiao',
            'htmlOptionTrinhDoVanHoa',
            'htmlOptionNgoaiNgu',
            'htmlOptionTinHoc',
            'htmlOptionChucVu',
            'cccd',
            'htmlOptionChiBo',
            'htmlOptionNoiSinh',
            'htmlOptionQueQuan'
        ));
    }

    public function update($id,Request $request){
        $maDangVien = $request->maDangVien;
        $hoLot = $request->hoLot;
        $ten = $request->ten;
        $tenGoiKhac = $request->tenGoiKhac;
        $gioiTinh = $request->gioiTinh;
        $ngaySinh = $request->ngaySinh;
        $noiSinh_ma = $request->noiSinh_ma;
        $CCCD = $request->CCCD;
        $ngayCap = $request->ngayCap;
        $noiCap = $request->noiCap;
        $danToc_ma = $request->danToc_ma;
        $tonGiao_ma = $request->tonGiao_ma;
        $queQuan = $request->queQuan_ma;
        $diaChiThuongTru = $request->diaChiThuongTru;
        $noiOHienTai = $request->noiOHienTai;
        $dienThoaiCoQuan = $request->dienThoaiCoQuan;
        $dienThoaiNha = $request->dienThoaiNha;
        $dienThoaiCaNhan = $request->dienThoaiCaNhan;
        $email = $request->email;
        $tinhTrangHonNhan = $request->tinhTrangHonNhan;
        $thanhPhanXuatThan = $request->thanhPhanXuatThan;
        $dienUuTien = $request->dienUuTien;
        $nangKhieu = $request->nangKhieu;
        $soTruong = $request->soTruong;
        $tinhTrangSucKhoe = $request->tinhTrangSucKhoe;
        $khuyetTat = $request->khuyetTat;
        $trinhDoVanHoa_ma = $request->trinhDoVanHoa_ma;
        $ngoaiNgu_ma = $request->ngoaiNgu_ma;
        $tinHoc_ma = $request->tinHoc_ma;
        $chucVu_ma = $request->chucVu_ma;
        $chiBo_ma = $request->chiBo_ma;

        $dangVien = $this->dangVien->find($id);

        $cccd = $this->cccd->find($dangVien->CCCD_id)->update([
            'CCCD' => $CCCD,
            'ngayCap' => $ngayCap,
            'noiCap' => $noiCap
        ]);

        $dangVien->update([
            'maDangVien' => $maDangVien,
            'hoLot' => $hoLot,
            'ten' => $ten,
            'tenGoiKhac' => $tenGoiKhac,
            'gioiTinh' => $gioiTinh,
            'ngaySinh' => $ngaySinh,
            'noiSinh_ma' => $noiSinh_ma,
            'danToc_ma' => $danToc_ma,
            'tonGiao_ma' => $tonGiao_ma,
            'queQuan_ma' => $queQuan,
            'diaChiThuongTru' => $diaChiThuongTru,
            'noiOHienTai' => $noiOHienTai,
            'dienThoaiCoQuan' => $dienThoaiCoQuan,
            'dienThoaiNha' => $dienThoaiNha,
            'dienThoaiCaNhan' => $dienThoaiCaNhan,
            'email' => $email,
            'tinhTrangHonNhan' => $tinhTrangHonNhan,
            'thanhPhanXuatThan' => $thanhPhanXuatThan,
            'dienUuTien' => $dienUuTien,
            'nangKhieu' => $nangKhieu,
            'soTruong' => $soTruong,
            'tinhTrangSucKhoe' => $tinhTrangSucKhoe,
            'khuyetTat' => $khuyetTat,
            'trinhDoVanHoa_ma' => $trinhDoVanHoa_ma,
            'ngoaiNgu_ma' => $ngoaiNgu_ma,
            'tinHoc_ma' => $tinHoc_ma,
            'chucVu_ma' => $chucVu_ma,
            'chiBo_ma' => $chiBo_ma
        ]);
    return redirect()->route('dangvien.danhsach');
    }

    public function delete($id){
        try{
            $this->dangVien->find($id)->delete();
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

    public function index_dangvienchuyendi(){
        $dangVien = DB::select('select * from dangviens,dangvienchuyendis where dangviens.id = dangvienchuyendis.dangVien_ma AND deleted_at is not null');
        $cccd = $this->cccd->all();
        $danToc = $this->danToc->all();
        $tonGiao = $this->tonGiao->all();
        $trinhDoVanHoa = $this->trinhDoVanHoa->all();
        $ngoaiNgu = $this->ngoaiNgu->all();
        $tinHoc = $this->tinHoc->all();
        $chucVu = $this->chucVu->all();
        $chiBo = $this->chiBo->all();
        $thanhPho = $this->thanhPho->all();
        return view('admin.dangvienchuyendi.index', compact(
            'dangVien',
            'cccd',
            'danToc',
            'tonGiao',
            'trinhDoVanHoa',
            'ngoaiNgu',
            'tinHoc',
            'chucVu',
            'chiBo',
            'thanhPho'
        ));
    }

    public function create_dangvienchuyendi($id){
        $dangVien = $this->dangVien::find($id);
        return view('admin.dangvienchuyendi.create',compact('dangVien'));
    }

    public function store_dangvienchuyendi($id,Request $request){
        $dangVienChuyenDi = Dangvienchuyendi::firstOrCreate([
            'dangVien_ma' => $id,
            'ngayChuyenDi' => $request->ngayChuyenDi
        ]);
        $this->dangVien->find($id)->delete();
        return redirect()->route('dangvienchuyendi.danhsach');
    }


    public function index_dangviendaxoa() {
        $dangVien = DB::table('dangviens')->where('deleted_at','<>',' null')->get();
        $cccd = $this->cccd->all();
        $danToc = $this->danToc->all();
        $tonGiao = $this->tonGiao->all();
        $trinhDoVanHoa = $this->trinhDoVanHoa->all();
        $ngoaiNgu = $this->ngoaiNgu->all();
        $tinHoc = $this->tinHoc->all();
        $chucVu = $this->chucVu->all();
        $chiBo = $this->chiBo->all();
        $thanhPho = $this->thanhPho->all();

        $htmlOptionDantoc = $this->getOption($danToc,$ma = 'maDanToc', $value = '',$name = 'tenDanToc',$dk = '');

        $htmlOptionTonGiao = $this->getOption($tonGiao,$ma = 'maTonGiao', $value = '',$name = 'tenTonGiao',$dk = '');

        $htmlOptionTrinhDoVanHoa = $this->getOption($trinhDoVanHoa,$ma = 'maTrinhDo', $value = '',$name = 'tenTrinhDo',$dk = '');

        $htmlOptionNgoaiNgu = $this->getOption($ngoaiNgu,$ma = 'maNgoaiNgu', $value = 'tenNgoaiNgu',$name = 'trinhDo',$dk = '');

        $htmlOptionTinHoc = $this->getOption($tinHoc,$ma = 'maTinHoc', $value = 'tenTinHoc',$name = 'loai',$dk = '');

        $htmlOptionChucVu = $this->getOption($chucVu,$ma = 'maChucVu', $value = '',$name = 'tenChucVu',$dk = '');

        $htmlOptionChiBo = $this->getOption($chiBo,$ma = 'maChiBo', $value = '',$name = 'tenChiBo',$dk = '');

        $htmlOptionNoiSinh = $this->getOption($thanhPho,$ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = '');

        $htmlOptionQueQuan = $this->getOption($thanhPho,$ma = 'maThanhPho', $value = '',$name = 'tenThanhPho',$dk = '');

        return view('admin.dangvien.dangVienDeleted',compact(
            'dangVien',
            'cccd',
            'danToc',
            'tonGiao',
            'trinhDoVanHoa',
            'ngoaiNgu',
            'tinHoc',
            'chucVu',
            'chiBo',
            'thanhPho',
            'htmlOptionDantoc',
            'htmlOptionTonGiao',
            'htmlOptionTrinhDoVanHoa',
            'htmlOptionNgoaiNgu',
            'htmlOptionTinHoc',
            'htmlOptionChucVu',
            'htmlOptionChiBo',
            'htmlOptionNoiSinh',
            'htmlOptionQueQuan'
        ));
    }

    public function undo_dangviendaxoa($id){
        DB::table('dangviens')
              ->where('id', $id)
              ->update(['deleted_at' => null]);
       return redirect()->back();
    }

    public function delete_dangviendaxoa($id){
        try{
            DB::table('dangviens')->where('id',$id)->delete();
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
