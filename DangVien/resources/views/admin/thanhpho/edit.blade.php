@extends('layouts.admin')

@section('title')
    Thành phố
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Thành phố', 'title' => 'cập nhật','route' => 'thanhpho.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật thành phố</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('thanhpho.update',['id' => $thanhPho->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Mã thành phố</label>
                                <input type="text" class="form-control" name="maThanhPho" value="{{$thanhPho->maThanhPho}}" placeholder="Nhập tên thành phố" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên thành phố</label>
                                <input type="text" class="form-control" name="tenThanhPho" value="{{$thanhPho->tenThanhPho}}" placeholder="Nhập tên thành phố" required>
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
