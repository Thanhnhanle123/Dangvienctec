@extends('layouts.admin')

@section('title')
    Tôn giáo
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Tôn giáo', 'title' => 'cập nhật','route' => 'tongiao.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật tôn giáo</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('tongiao.update',['id' => $tonGiao->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã tôn giáo</label>
                              <input type="text" class="form-control" name="maTonGiao" value="{{$tonGiao->maTonGiao}}" placeholder="Nhập mã tôn giáo" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên tôn giáo</label>
                                <input type="text" class="form-control" name="tenTonGiao" value="{{$tonGiao->tenTonGiao}}" placeholder="Nhập tên tôn giáo" required>
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
