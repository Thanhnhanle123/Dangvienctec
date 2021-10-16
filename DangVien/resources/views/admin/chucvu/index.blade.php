@extends('layouts.admin')

@section('title')
    Chức vụ
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Chức vụ', 'title' => 'danh sách','route' => 'chucvu.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Danh sách</h3>
                    </div>
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="canGiua">STT</th>
                                <th scope="col">Mã chức vụ</th>
                                <th scope="col">Tên chức vụ</th>
                                <th scope="col" class="canGiua">Sữa</th>
                                <th scope="col" class="canGiua">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($chucVu as $cv)
                            <tr>
                                <th scope="row" class="canGiua">1</th>
                                <td>{{$cv->maChucVu}}</td>
                                <td>{{$cv->tenChucVu}}</td>
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('chucvu.edit',['id' => $cv->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td class="canGiua">
                                    <a class="btn btn-danger action_delete" data-url="{{ route('chucvu.delete',['id' => $cv->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            {{$chucVu->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Thêm chức vụ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('chucvu.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã chức vụ</label>
                              <input type="text" class="form-control @error('maChucVu') is-invalid @enderror" name="maChucVu" placeholder="Nhập mã chức vụ">
                                @error('maChucVu')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên chức vụ</label>
                                <input type="text" class="form-control @error('tenChucVu') is-invalid @enderror" name="tenChucVu" placeholder="Nhập tên chức vụ">
                                @error('tenChucVu')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
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


