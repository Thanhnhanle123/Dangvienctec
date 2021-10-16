@extends('layouts.admin')

@section('title')
    Dân tộc
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Dân tộc', 'title' => 'cập nhật','route' => 'dantoc.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật dân tộc</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('dantoc.update',['id' => $danToc->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã dân tộc</label>
                              <input type="text" class="form-control" name="maDanToc" value="{{$danToc->maDanToc}}" placeholder="Nhập mã dân tộc" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên dân tộc</label>
                                <input type="text" class="form-control" name="tenDanToc" value="{{$danToc->tenDanToc}}" placeholder="Nhập tên dân tộc" required>
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
