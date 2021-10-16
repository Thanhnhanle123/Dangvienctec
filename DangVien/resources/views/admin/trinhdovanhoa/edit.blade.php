@extends('layouts.admin')

@section('title')
    Trình độ văn hóa
@endsection


@section('css')

@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Trình độ văn hóa', 'title' => 'cập nhật','route' => 'trinhdovanhoa.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Cập nhật trình độ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('trinhdovanhoa.update',['id' => $trinhDoVanHoa->id])}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã trình độ</label>
                              <input type="text" class="form-control" name="maTrinhDo" value="{{$trinhDoVanHoa->maTrinhDo}}" placeholder="Nhập mã trình độ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên trình độ</label>
                                <input type="text" class="form-control" name="tenTrinhDo" value="{{$trinhDoVanHoa->tenTrinhDo}}" placeholder="Nhập tên trình độ" required>
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
