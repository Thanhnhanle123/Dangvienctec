@extends('layouts.admin')

@section('title')
    Thành phố
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/thanhpho/index.css') }}">
{{-- C:\xampp\htdocs\DangVien\public\adminLTE\admins\thanhpho\index.css --}}
@endsection
@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Thành phố', 'title' => 'danh sách','route' => 'thanhpho.danhsach'])

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
                                <th scope="col">Mã thành phố</th>
                                <th scope="col">Tên thành phố</th>
                                <th scope="col" class="canGiua">Sữa</th>
                                <th scope="col" class="canGiua">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach ($thanhPho as $tp)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$tp->maThanhPho}}</td>
                                <td>{{$tp->tenThanhPho}}</td>
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('thanhpho.edit',['id' => $tp->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td class="canGiua">
                                    <a class="btn btn-danger action_delete" data-url="{{ route('thanhpho.delete',['id' => $tp->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            {{$thanhPho->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Thêm thành phố</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('thanhpho.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Mã thành phố</label>
                                <input type="text" class="form-control @error('maThanhPho') is-invalid @enderror" name="maThanhPho" placeholder="Nhập mã thành phố">
                                @error('tenThanhPho')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên thành phố</label>
                                <input type="text" class="form-control @error('tenThanhPho') is-invalid @enderror" name="tenThanhPho" placeholder="Nhập tên thành phố">
                                @error('tenThanhPho')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
            <div class="m-2">
                <form action="{{ route('thanhpho.upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="file-upload">
                    <button type="submit" class="icon-file-upload"><i class="fas fa-upload"></i></button>
                </form>
                @if (session('success'))
                    <div class="alert alert-success notification">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


