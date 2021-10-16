@extends('layouts.admin')

@section('title')
    Quản trị viên
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Quản trị viên', 'title' => 'cập nhật','route' => 'quantrivien.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{ route('quantrivien.update',['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="inDam">Cập nhật quản trị viên</h3>
                        </div>
                        <div class="col-lg-7">
                                <div class="mb-3">
                                <label class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="userName" value="{{$user->userName}}" placeholder="Nhập tên đăng nhập" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">password</label>
                                    <input type="text" class="form-control" name="password" value="{{$user->password_show}}" placeholder="Nhập tên quản trị viên" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên người dùng</label>
                                    <input type="text" class="form-control" name="tenNguoiDung" value="{{$user->tenNguoiDung}}" placeholder="Nhập tên người dùng" required>
                                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="file_anh">
                            </div>
                            <div class="col-lg-12">
                                <img class="img-fluid" src="{{$user->file_path}}" alt="Ảnh đại diện">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')

@endsection
