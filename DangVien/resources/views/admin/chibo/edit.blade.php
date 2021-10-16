@extends('layouts.admin')

@section('title')
    Chi bộ
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Chi bộ', 'title' => 'cập nhật','route' => 'chibo.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật chi bộ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('chibo.update',['id' => $chiBo->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã chi bộ</label>
                              <input type="text" class="form-control" name="maChiBo" value="{{$chiBo->maChiBo}}" placeholder="Nhập mã chi bộ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên chi bộ</label>
                                <input type="text" class="form-control" name="tenChiBo" value="{{$chiBo->tenChiBo}}" placeholder="Nhập tên chi bộ" required>
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
