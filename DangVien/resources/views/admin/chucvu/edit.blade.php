@extends('layouts.admin')

@section('title')
    Chức vụ
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Chức vụ', 'title' => 'cập nhật','route' => 'chucvu.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật chức vụ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('chucvu.update',['id' => $chucVu->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã chức vụ</label>
                              <input type="text" class="form-control" name="maChucVu" value="{{$chucVu->maChucVu}}" placeholder="Nhập mã chức vụ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên chức vụ</label>
                                <input type="text" class="form-control" name="tenChucVu" value="{{$chucVu->tenChucVu}}" placeholder="Nhập tên chức vụ" required>
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
