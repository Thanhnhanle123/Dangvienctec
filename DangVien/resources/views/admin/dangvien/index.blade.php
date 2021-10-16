@extends('layouts.admin')

@section('title')
    Đảng viên
@endsection

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/dangvien/index.css') }}">
@endsection

@section('Content')
    <div class="wrapper">
        <div class="content-wrapper">
            @include('partials.content_header',['name'=>'Đảng Viên','title'=>'Danh sách','route' => 'dangvien.danhsach'])
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form  action="{{ route('dangvien.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="col-lg-12 loc">
                                        <select name="danToc_ma" id="#">
                                            <option value="0">Dân tộc</option>
                                            {{!! $htmlOptionDantoc !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="ngoaiNgu_ma" id="#">
                                            <option value="0">Ngoại ngữ</option>
                                            {{!! $htmlOptionNgoaiNgu !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="queQuan_ma" id="#">
                                            <option value="0">Quê quán</option>
                                            {{!! $htmlOptionQueQuan !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="tuoi_value" id="#">
                                            <option value="0">Tuổi đảng viên</option>
                                            <option value="1">Dảng viên từ 18 đến 30 tuổi</option>
                                            <option value="2">Dảng viên từ 31 đến 40 tuổi</option>
                                            <option value="3">Dảng viên từ 41 đến 50 tuổi</option>
                                            <option value="4">Dảng viên từ 51 đến 60 tuổi</option>
                                            <option value="5">Dảng viên trên 60 tuổi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-lg-12 loc">
                                        <select name="chucVu_ma" id="#">
                                            <option value="0">Chức vụ</option>
                                            {{!! $htmlOptionChucVu !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="tonGiao_ma" id="#">
                                            <option value="0">Tôn giáo</option>
                                            {{!! $htmlOptionTonGiao !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="tinHoc_ma" id="#">
                                            <option value="0">Tin học</option>
                                            {{!! $htmlOptionTinHoc !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="noiSinh_ma" id="#">
                                            <option value="0">Nơi sinh</option>
                                            {{!! $htmlOptionNoiSinh !!}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="col-lg-12 loc">
                                        <select name="trinhDoVanHoa_ma" id="#">
                                            <option value="0">Trình độ văn hóa</option>
                                            {{!! $htmlOptionTrinhDoVanHoa !!}}
                                        </select>
                                    </div>
                                    <div class="col-lg-12 loc">
                                        <select name="chiBo_ma" id="#">
                                            <option value="">Chi bộ</option>
                                            {{!! $htmlOptionChiBo !!}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 m-2">
                                    <button class="btn btn-primary" data-url="{{ route('dangvien.search') }}" type="submit"><i class="fas fa-search"> Tìm Kiếm</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-success show-deleted" href="{{ route('dangviendaxoa.danhsach') }}"><i class="fas fa-trash"></i></a>
                                <a class="btn btn-success float-right" href="{{ route('dangvien.create') }}">ADD</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="canGiua">STT</th>
                                    <th>Mã đảng viên</th>
                                    <th>Sữa</th>
                                    <th>Xóa</th>
                                    <th>Họ lót</th>
                                    <th>Tên</th>
                                    <th>Tên gọi khác</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Số CCCD</th>
                                    <th>Ngày cấp</th>
                                    <th>Nơi cấp</th>
                                    <th>Dân tộc</th>
                                    <th>Tôn giáo</th>
                                    <th>Quê quán</th>
                                    <th>Địa chỉ thường trú</th>
                                    <th>Nơi ở hiện tại</th>
                                    <th>Điện thoại cơ quan</th>
                                    <th>Điện thoại nhà</th>
                                    <th>Điện thoại cá nhân</th>
                                    <th>Email</th>
                                    <th>Tình trạng hôn nhân</th>
                                    <th>Thành phần xuất thân</th>
                                    <th>Diện ưu tiên gia đình</th>
                                    <th>Năng khiến</th>
                                    <th>Sở trường</th>
                                    <th>Tình trạng sức khỏe</th>
                                    <th>Khuyết tật</th>
                                    <th>Trình độ văn hóa</th>
                                    <th>Ngoại ngữ</th>
                                    <th>Tin học</th>
                                    <th>Chức vụ</th>
                                    <th>Chi bộ</th>
                                    <th>Chuyển đến</th>
                                    <th>Chuyển đi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                @foreach ($dangVien as $dv)
                                    <tr>
                                        <td></td>
                                        <td class="canGiua">{{$i}}</td>
                                        <td>{{$dv->maDangVien}}</td>
                                        <td>
                                            <a class="btn btn-success m-3" href="{{ route('dangvien.edit',['id' => $dv->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger m-3 action_delete" data-url="{{ route('dangvien.delete',['id' => $dv->id]) }}" ><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td>{{$dv->hoLot}}</td>
                                        <td>{{$dv->ten}}</td>
                                        <td>{{$dv->tenGoiKhac}}</td>
                                        <td>
                                            {{$dv->gioiTinh == 0 ? 'Nam' : 'Nữ'}}
                                        </td>
                                        <td>{{$dv->ngaySinh}}</td>
                                    @foreach ($thanhPho as $tp)
                                        @if ($tp->maThanhPho == $dv->noiSinh_ma)
                                        <td>{{$tp->tenThanhPho}}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($cccd as $cccd_coppy)
                                        @if ($cccd_coppy->id == $dv->CCCD_id)
                                        <td>{{$cccd_coppy->CCCD}}</td>
                                        <td>{{$cccd_coppy->ngayCap}}</td>
                                        <td>{{$cccd_coppy->noiCap}}</td>
                                        @endif
                                    @endforeach

                                    @foreach ($danToc as $dt)
                                        @if ($dt->maDanToc == $dv->danToc_ma)
                                        <td>{{$dt->tenDanToc}}</td>
                                        @endif
                                    @endforeach
                                        <td>
                                            @foreach ($tonGiao as $tg)
                                                @if ($tg->maTonGiao == $dv->tonGiao_ma)
                                                {{$tg->tenTonGiao}}
                                                @endif
                                            @endforeach
                                        </td>
                                        {{-- <td>{{$dv->quocTich}}</td> --}}
                                    @foreach ($thanhPho as $tp)
                                        @if ($tp->maThanhPho == $dv->queQuan_ma)
                                        <td>{{$tp->tenThanhPho}}</td>
                                        @endif
                                    @endforeach
                                        <td>{{$dv->diaChiThuongTru}}</td>
                                        <td>{{$dv->noiOHienTai}}</td>
                                        <td>{{$dv->dienThoaiCoQuan}}</td>
                                        <td>{{$dv->dienThoaiNha}}</td>
                                        <td>{{$dv->dienThoaiCaNhan}}</td>
                                        <td>{{$dv->email}}</td>
                                        <td>{{$dv->tinhTrangHonNhan}}</td>
                                        <td>{{$dv->thanhPhanXuatThan}}</td>
                                        <td>{{$dv->dienUuTien}}</td>
                                        <td>{{$dv->nangKhieu}}</td>
                                        <td>{{$dv->soTruong}}</td>
                                        <td>{{$dv->tinhTrangSucKhoe}}</td>
                                        <td>{{$dv->khuyetTat}}</td>
                                    @foreach ($trinhDoVanHoa as $tdvh)
                                        @if ($tdvh->maTrinhDo == $dv->trinhDoVanHoa_ma)
                                        <td>{{$tdvh->maTrinhDo}}</td>
                                        @endif
                                    @endforeach

                                    @foreach ($ngoaiNgu as $nn)
                                        @if ($nn->maNgoaiNgu == $dv->ngoaiNgu_ma)
                                        <td>
                                            {{$nn->maNgoaiNgu.'-'.$nn->tenNgoaiNgu.'-'.$nn->trinhDo}}
                                        </td>
                                        @endif
                                    @endforeach

                                    @foreach ($tinHoc as $th)
                                        @if ($th->maTinHoc == $dv->tinHoc_ma)
                                        <td>{{$th->tenTinHoc.'-'.$th->loai}}</td>
                                        @endif
                                    @endforeach

                                    @foreach ($chucVu as $cv)
                                        @if ($cv->maChucVu == $dv->chucVu_ma)
                                        <td>{{$cv->tenChucVu}}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($chiBo as $cb)
                                        @if ($cb->maChiBo == $dv->chiBo_ma)
                                        <td>{{$cb->tenChiBo}}</td>
                                        @endif
                                    @endforeach
                                        <td>
                                            <a class="btn btn-outline-success m-3" href=""><i class="fas fa-user-graduate"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger m-3" href="{{ route('dangvienchuyendi.create',['id' => $dv->id]) }}"><i class="fas fa-suitcase-rolling"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>STT</th>
                                    <th>Mã đảng viên</th>
                                    <th>Sữa</th>
                                    <th>Xóa</th>
                                    <th>Họ lót</th>
                                    <th>Tên</th>
                                    <th>Tên gọi khác</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Số CCCD</th>
                                    <th>Ngày cấp</th>
                                    <th>Nơi cấp</th>
                                    <th>Dân tộc</th>
                                    <th>Tôn giáo</th>
                                    <th>Quê quán</th>
                                    <th>Địa chỉ thường trú</th>
                                    <th>Nơi ở hiện tại</th>
                                    <th>Điện thoại cơ quan</th>
                                    <th>Điện thoại nhà</th>
                                    <th>Điện thoại cá nhân</th>
                                    <th>Email</th>
                                    <th>Tình trạng hôn nhân</th>
                                    <th>Thành phần xuất thân</th>
                                    <th>Diện ưu tiên gia đình</th>
                                    <th>Năng khiến</th>
                                    <th>Sở trường</th>
                                    <th>Tình trạng sức khỏe</th>
                                    <th>Khuyết tật</th>
                                    <th>Trình độ văn hóa</th>
                                    <th>Ngoại ngữ</th>
                                    <th>Tin học</th>
                                    <th>Chức vụ</th>
                                    <th>Chi bộ</th>
                                    <th>Chuyển đến</th>
                                    <th>Chuyển đi</th>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('adminLTE/admins/dangvien/index.js')}}"></script>

    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
@endsection


