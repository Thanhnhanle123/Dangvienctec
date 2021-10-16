@extends('layouts.admin')

@section('title')
    Đảng viên
@endsection

@section('Content')
    <div class="wrapper">
        <div class="content-wrapper">
            @include('partials.content_header',['name'=>'Đảng Viên','title'=>'thêm','route' => 'dangvien.danhsach'])
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <form action="{{ route('dangvien.store') }}" method="POST">
                    @csrf
                    <div class="row">
                       <div class="col-md-12">
                           <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <label>Mã đảng viên</label>
                                <input type="text" class="form-control @error('maDangVien') is-invalid @enderror" name="maDangVien" placeholder="Nhập mã đảng viên">
                                @error('maDangVien')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Họ lót</label>
                                    <input type="text" class="form-control @error('hoLot') is-invalid @enderror" name="hoLot" placeholder="Nhập họ lót">
                                    @error('hoLot')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tên</label>
                                    <input type="text" class="form-control @error('ten') is-invalid @enderror" name="ten" placeholder="Nhập tên đảng viên">
                                    @error('ten')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tên gọi khác</label>
                                    <input type="text" class="form-control" name="tenGoiKhac" placeholder="Nhập tên đảng viên">
                                </div>
                                <div class="mb-3">
                                    <label>Giới tính</label>
                                    <select name="gioiTinh" id=""class="form-control">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control @error('ngaySinh') is-invalid @enderror" name="ngaySinh">
                                    @error('ngaySinh')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nơi sinh</label>
                                    <select name="noiSinh_ma" id="" class="form-control @error('noiSinh_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {{!! $htmlOptionNoiSinh !!}}
                                    </select>
                                    {{-- <input type="text" class="form-control" name="noiSinh" placeholder="Nơi sinh"> --}}
                                    @error('noiSinh_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Số CCCD</label>
                                    <input type="text" class="form-control @error('CCCD') is-invalid @enderror" name="CCCD" placeholder="Nhập số CCCD">
                                    @error('CCCD')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Ngày cấp</label>
                                    <input type="date" class="form-control @error('ngayCap') is-invalid @enderror" name="ngayCap">
                                    @error('ngayCap')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nơi cấp</label>
                                    <input type="text" class="form-control @error('noiCap') is-invalid @enderror" name="noiCap" placeholder="Nơi cấp">
                                    @error('noiCap')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Dân tộc</label>
                                    <select name="danToc_ma" id="" class="form-control @error('danToc_ma') is-invalid @enderror">
                                        {{!! $htmlOptionDantoc !!}}
                                    </select>
                                    @error('danToc_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tôn giáo</label>
                                    <select name="tonGiao_ma" id="" class="form-control @error('tonGiao_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {{!! $htmlOptionTonGiao !!}}
                                    </select>
                                    @error('tonGiao_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Quốc tịch</label>
                                    <select name="quocTich" id="" class="form-control @error('quocTich') is-invalid @enderror">
                                    <option value="1">Việt Nam</option>
                                    </select>
                                    @error('quocTich')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label>Quê quán</label>
                                    <select name="queQuan_ma" id="" class="form-control @error('queQuan_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {{!! $htmlOptionQueQuan !!}}
                                    </select>
                                    {{-- <input type="text" class="form-control" name="queQuan" placeholder="Quê quán"> --}}
                                    @error('queQuan_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nơi ở thường trú</label>
                                    <input type="text" class="form-control @error('diaChiThuongTru') is-invalid @enderror" name="diaChiThuongTru" placeholder="Địa chỉ thường trú">
                                    @error('diaChiThuongTru')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nơi ở hiện tại</label>
                                    <input type="text" class="form-control @error('noiOHienTai') is-invalid @enderror" name="noiOHienTai" placeholder="Nơi ở hiện tại">
                                    @error('noiOHienTai')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại cơ quan</label>
                                    <input type="tel" class="form-control" name="dienThoaiCoQuan" placeholder="Điện thoại cơ quan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label>Điện thoại nhà</label>
                                    <input type="tel" class="form-control" name="dienThoaiNha" placeholder="Điện thoại nhà">
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại cá nhân</label>
                                    <input type="tel" class="form-control @error('dienThoaiCaNhan') is-invalid @enderror" name="dienThoaiCaNhan" placeholder="Điện thoại cá nhân">
                                    @error('dienThoaiCaNhan')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label>Tình trạng hôn nhân</label>
                                    <input type="text" class="form-control" name="tinhTrangHonNhan" placeholder="Tình trạng hôn nhân">
                                </div>
                                <div class="mb-3">
                                    <label>Thành phân gia đình</label>
                                    <input type="text" class="form-control" name="thanhPhanXuatThan" placeholder="Thành phân gia đình">
                                </div>
                                <div class="mb-3">
                                    <label>Diện ưu tiên</label>
                                    <input type="text" class="form-control" name="dienUuTien" placeholder="Diện ưu tiên">
                                </div>
                                <div class="mb-3">
                                    <label>Năng khiếu</label>
                                    <input type="text" class="form-control" name="nangKhieu" placeholder="Năng khiếu">
                                </div>
                                <div class="mb-3">
                                    <label>Sở trường</label>
                                    <input type="text" class="form-control" name="soTruong" placeholder="Sở trường">
                                </div>
                                <div class="mb-3">
                                    <label>Tình trạng sức khỏe</label>
                                    <input type="text" class="form-control" name="tinhTrangSucKhoe" placeholder="Tình trạng sức khỏe">
                                </div>
                                <div class="mb-3">
                                    <label>Khuyết tật</label>
                                    <input type="text" class="form-control" name="khuyetTat" placeholder="Khuyết tật">
                                </div>
                                <div class="mb-3">
                                    <label>Trình độ văn hóa</label>
                                    <select name="trinhDoVanHoa_ma" id="" class="form-control @error('trinhDoVanHoa_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {!! $htmlOptionTrinhDoVanHoa !!}
                                    </select>
                                    @error('trinhDoVanHoa_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Ngoại ngữ</label>
                                    <select name="ngoaiNgu_ma" id="" class="form-control">
                                        <option value="0"></option>
                                        {!! $htmlOptionNgoaiNgu !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Tin học</label>
                                    <select name="tinHoc_ma" id="" class="form-control">
                                        <option value="0"></option>
                                        {!! $htmlOptionTinHoc !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Chức vụ</label>
                                    <select name="chucVu_ma" id="" class="form-control @error('chucVu_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {!! $htmlOptionChucVu !!}
                                    </select>
                                    @error('chucVu_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Chi bộ</label>
                                    <select name="chiBo_ma" id="" class="form-control @error('chiBo_ma') is-invalid @enderror">
                                        <option value="0"></option>
                                        {!! $htmlOptionChiBo !!}
                                    </select>
                                    @error('chiBo_ma')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
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



