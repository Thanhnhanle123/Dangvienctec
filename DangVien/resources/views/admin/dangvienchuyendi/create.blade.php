@extends('layouts.admin')

@section('title')
    Đảng viên chuyển đi
@endsection

@section('Content')
    <div class="wrapper">
        <div class="content-wrapper">
            @include('partials.content_header',['name'=>'Đảng Viên chuyển đi','title'=>'thêm','route' => 'dangvienchuyendi.danhsach','route' => 'dangvienchuyendi.danhsach'])
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <form action="{{ route('dangvienchuyendi.store',['id' => $dangVien->id]) }}" method="POST">
                    @csrf
                    <div class="row">
                       <div class="col-md-12">
                           <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <label>Mã đảng viên</label>
                                <input type="text" class="form-control" value="{{$dangVien->maDangVien}}">
                                </div>
                                <div class="mb-3">
                                    <label>Họ tên đảng viên</label>
                                    <input type="text" class="form-control"value="{{$dangVien->hoLot.' '.$dangVien->ten}}">
                                </div>
                                <div class="mb-3">
                                    <label>Ngày chuyển đi</label>
                                    <input type="date" class="form-control" name="ngayChuyenDi" placeholder="Nhập họ lót">
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



