@extends('layouts.admin')

@section('title')
    Ngoại ngữ
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Ngoại ngữ', 'title' => 'cập nhật','route' => 'ngoaingu.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật ngoại ngữ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('ngoaingu.update',['id' => $ngoaiNgu->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã ngoại ngữ</label>
                              <input type="text" class="form-control" name="maNgoaiNgu" value="{{$ngoaiNgu->maNgoaiNgu}}" placeholder="Nhập mã ngoại ngữ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên ngoại ngữ</label>
                                <input type="text" class="form-control" name="tenNgoaiNgu" value="{{$ngoaiNgu->tenNgoaiNgu}}" placeholder="Nhập tên ngoại ngữ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Trình độ</label>
                                <input type="text" class="form-control" name="trinhDo" value="{{$ngoaiNgu->trinhDo}}" placeholder="Trình độ" required>
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
