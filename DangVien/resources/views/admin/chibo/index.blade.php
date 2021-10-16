@extends('layouts.admin')

@section('title')
    Chi bộ
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Chi bộ', 'title' => 'danh sách','route' => 'chibo.danhsach'])

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
                                <th scope="col">STT</th>
                                <th scope="col">Mã chi bộ</th>
                                <th scope="col">Tên chi bộ</th>
                                <th scope="col" class="canGiua">Sữa</th>
                                <th scope="col" class="canGiua">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i= 1?>
                            @foreach ($chiBo as $cb)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$cb->maChiBo}}</td>
                                <td>{{$cb->tenChiBo}}</td>
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('chibo.edit',['id' => $cb->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td class="canGiua">
                                    <a
                                        class="btn btn-danger action_delete"
                                        data-url="{{ route('chibo.delete',['id' => $cb->id]) }}"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            {{$chiBo->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Thêm chi bộ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('chibo.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã chi bộ</label>
                              <input type="text" class="form-control @error('maChiBo') is-invalid @enderror" name="maChiBo" placeholder="Nhập mã chi bộ" >
                                @error('maChiBo')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên chi bộ</label>
                                <input type="text" class="form-control @error('tenChiBo') is-invalid @enderror" name="tenChiBo" placeholder="Nhập tên chi bộ" >
                                @error('tenChiBo')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
            <div class="m-2">
                <form action="{{ route('chibo.upload') }}" method="post" enctype="multipart/form-data">
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


