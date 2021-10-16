@extends('layouts.admin')


@section('css')

@endsection


@section('Content')
<div class="content-wrapper">

    @include('partials.content_header',['name' => 'Trang chủ', 'title' => 'Bảng điều khiển','route' => 'trangchu'])

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$dangVien[0]->dem}}</h3>

                <p>Đảng viên</p>
              </div>
              <div class="icon">
                {{-- <i class="ion ion-bag"></i> --}}
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="{{ route('dangvien.danhsach') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$dangVienChuyenDi[0]->dem}}</h3>

                <p>Đảng viên chuyển đi</p>
              </div>
              <div class="icon">
                {{-- <i class="ion ion-stats-bars"></i> --}}
                <i class="fas fa-address-book"></i>
              </div>
              <a href="{{ route('dangvienchuyendi.danhsach') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$quanTriVien[0]->dem}}</h3>

                <p>Quản trị viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('quantrivien.danhsach') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$chiBo[0]->dem}}</h3>

                <p>Chi bộ</p>
              </div>
              <div class="icon">
                {{-- <i class="ion ion-pie-graph"></i> --}}
                <i class="fas fa-handshake"></i>
              </div>
              <a href="{{ route('chibo.danhsach') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
    </div>
</section>
    <!-- /.content -->
</div>
@endsection


@section('js')

@endsection
