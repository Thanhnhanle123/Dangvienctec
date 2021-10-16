@extends('layouts.admin')

@section('title')
    Đảng viên
@endsection

@section('Content')
    <div class="wrapper">
        <div class="content-wrapper">
            @include('partials.content_header',['name'=>'Đảng Viên','title'=>'cập nhật','route' => 'dangvien.danhsach'])
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <form action="{{ route('dangvien.update',['id' => $dangVien->id]) }}" method="POST">
                    @csrf
                    <div class="row">
                       <div class="col-md-12">
                           <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <label>Mã đảng viên</label>
                                <input type="text" class="form-control" name="maDangVien" value="{{$dangVien->maDangVien}}" placeholder="Nhập mã đảng viên">
                                </div>
                                <div class="mb-3">
                                    <label>Họ lót</label>
                                    <input type="text" class="form-control" name="hoLot" value="{{$dangVien->hoLot}}" placeholder="Nhập họ lót">
                                </div>
                                <div class="mb-3">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" name="ten" value="{{$dangVien->ten}}" placeholder="Nhập tên đảng viên">
                                </div>
                                <div class="mb-3">
                                    <label>Tên gọi khác</label>
                                    <input type="text" class="form-control" name="tenGoiKhac" value="{{$dangVien->tenGoiKhac}}" placeholder="Nhập tên đảng viên">
                                </div>
                                <div class="mb-3">
                                    <label>Giới tính</label>
                                    <select name="gioiTinh" id=""class="form-control">
                                        <option value="0" {{$dangVien->gioiTinh == 0?'selected':''}}>Nam</option>
                                        <option value="1" {{$dangVien->gioiTinh == 1?'selected':''}}>Nữ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control" value="{{$dangVien->ngaySinh}}" name="ngaySinh">
                                </div>
                                <div class="mb-3">
                                    <label>Nơi sinh</label>
                                    <select name="noiSinh_ma" id="" class="form-control">
                                        <option value="0"></option>
                                        {{!! $htmlOptionNoiSinh !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Số CCCD</label>
                                    <input type="text" class="form-control" name="CCCD" value="{{$cccd->CCCD}}" placeholder="Nhập số CCCD">
                                </div>
                                <div class="mb-3">
                                    <label>Ngày cấp</label>
                                    <input type="date" class="form-control" value="{{$cccd->ngayCap}}" name="ngayCap">
                                </div>
                                <div class="mb-3">
                                    <label>Nơi cấp</label>
                                    <input type="text" class="form-control" value="{{$cccd->noiCap}}" name="noiCap" placeholder="Nơi cấp">
                                </div>
                                <div class="mb-3">
                                    <label>Dân tộc</label>
                                    <select name="danToc_ma" id="" class="form-control">
                                        {{!! $htmlOptionDantoc !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Tôn giáo</label>
                                    <select name="tonGiao_ma" id="" class="form-control">
                                        <option value="0"></option>
                                        {{!! $htmlOptionTonGiao !!}}
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Quốc tịch</label>
                                    <select name="quocTich" id="" class="form-control">
                                    <option value="1">Việt Nam</option>
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label>Quê quán</label>
                                    <select name="queQuan_ma" id="" class="form-control">
                                        <option value="0"></option>
                                        {{!! $htmlOptionQueQuan !!}}
                                    </select>
                                    {{-- <input type="text" class="form-control" name="queQuan" value="{{$dangVien->queQuan}}" placeholder="Quê quán"> --}}
                                </div>
                                <div class="mb-3">
                                    <label>Nơi ở thường trú</label>
                                    <input type="text" class="form-control" name="diaChiThuongTru" value="{{$dangVien->diaChiThuongTru}}" placeholder="Địa chỉ thường trú">
                                </div>
                                <div class="mb-3">
                                    <label>Nơi ở hiện tại</label>
                                    <input type="text" class="form-control" name="noiOHienTai" value="{{$dangVien->noiOHienTai}}" placeholder="Nơi ở hiện tại">
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại cơ quan</label>
                                    <input type="tel" class="form-control" name="dienThoaiCoQuan" value="{{$dangVien->dienThoaiCoQuan}}" placeholder="Điện thoại cơ quan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label>Điện thoại nhà</label>
                                    <input type="tel" class="form-control" name="dienThoaiNha" value="{{$dangVien->dienThoaiNha}}" placeholder="Điện thoại nhà">
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại cá nhân</label>
                                    <input type="tel" class="form-control" name="dienThoaiCaNhan" value="{{$dangVien->dienThoaiCaNhan}}" placeholder="Điện thoại cá nhân">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$dangVien->email}}" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label>Tình trạng hôn nhân</label>
                                    <input type="text" class="form-control" name="tinhTrangHonNhan" value="{{$dangVien->tinhTrangHonNhan}}" placeholder="Tình trạng hôn nhân">
                                </div>
                                <div class="mb-3">
                                    <label>Thành phân gia đình</label>
                                    <input type="text" class="form-control" name="thanhPhanXuatThan" value="{{$dangVien->thanhPhanXuatThan}}" placeholder="Thành phân gia đình">
                                </div>
                                <div class="mb-3">
                                    <label>Diện ưu tiên</label>
                                    <input type="text" class="form-control" name="dienUuTien" value="{{$dangVien->dienUuTien}}" placeholder="Diện ưu tiên">
                                </div>
                                <div class="mb-3">
                                    <label>Năng khiếu</label>
                                    <input type="text" class="form-control" name="nangKhieu" value="{{$dangVien->nangKhieu}}" placeholder="Năng khiếu">
                                </div>
                                <div class="mb-3">
                                    <label>Sở trường</label>
                                    <input type="texts" class="form-control" name="soTruong" value="{{$dangVien->soTruong}}" placeholder="Sở trường">
                                </div>
                                <div class="mb-3">
                                    <label>Tình trạng sức khỏe</label>
                                    <input type="text" class="form-control" name="tinhTrangSucKhoe" value="{{$dangVien->tinhTrangSucKhoe}}" placeholder="Tình trạng sức khỏe">
                                </div>
                                <div class="mb-3">
                                    <label>Khuyết tật</label>
                                    <input type="text" class="form-control" name="khuyetTat" value="{{$dangVien->khuyetTat}}" placeholder="Khuyết tật">
                                </div>
                                <div class="mb-3">
                                    <label>Trình độ văn hóa</label>
                                    <select name="trinhDoVanHoa_ma" id="" class="form-control">
                                        <option value="null"></option>
                                        {{!! $htmlOptionTrinhDoVanHoa !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Ngoại ngữ</label>
                                    <select name="ngoaiNgu_ma" id="" class="form-control">
                                        <option value="null"></option>
                                        {{!! $htmlOptionNgoaiNgu !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Tin học</label>
                                    <select name="tinHoc_ma" id="" class="form-control">
                                        <option value="null"></option>
                                        {{!! $htmlOptionTinHoc !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Chức vụ</label>
                                    <select name="chucVu_ma" id="" class="form-control">
                                        <option value="null"></option>
                                        {{!! $htmlOptionChucVu !!}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Chi bộ</label>
                                    <select name="chiBo_ma" id="" class="form-control">
                                        <option value="null"></option>
                                        {{!! $htmlOptionChiBo !!}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 m-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                           </div>
                       </div>
                    <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection



