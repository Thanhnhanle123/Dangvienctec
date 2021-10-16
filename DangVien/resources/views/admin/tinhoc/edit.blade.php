@extends('layouts.admin')

@section('title')
    Tin học
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Tin học', 'title' => 'cập nhật','route' => 'tinhoc.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật tin học</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('tinhoc.update',['id' => $tinHoc->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã tin học</label>
                              <input type="text" class="form-control" name="maTinHoc" value="{{$tinHoc->maTinHoc}}" placeholder="Nhập mã tin học" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên tin học</label>
                                <input type="text" class="form-control" name="tenTinHoc" value="{{$tinHoc->tenTinHoc}}" placeholder="Nhập tên tin học" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại</label>
                                <input type="text" class="form-control" name="loai" value="{{$tinHoc->loai}}" placeholder="Loại" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')

@endsection
