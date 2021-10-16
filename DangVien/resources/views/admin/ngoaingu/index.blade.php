@extends('layouts.admin')

@section('title')
    Ngoại ngữ
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Ngoại ngữ', 'title' => 'danh sách','route' => 'ngoaingu.danhsach'])

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
                                <th scope="col">Mã ngoại ngữ</th>
                                <th scope="col">Tên ngoại ngữ</th>
                                <th scope="col">Trình độ</th>
                                <th scope="col" class="canGiua">Sữa</th>
                                <th scope="col" class="canGiua">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                            @foreach ($ngoaiNgu as $nn)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$nn->maNgoaiNgu}}</td>
                                <td>{{$nn->tenNgoaiNgu}}</td>
                                <td>{{$nn->trinhDo}}</td>
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('ngoaingu.edit',['id' => $nn->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td class="canGiua">
                                    <a class="btn btn-danger action_delete" data-url="{{ route('ngoaingu.delete',['id' => $nn->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        {{$ngoaiNgu->links()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Thêm ngoại ngữ</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('ngoaingu.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã ngoại ngữ</label>
                              <input type="text" class="form-control" name="maNgoaiNgu" placeholder="Nhập mã ngoại ngữ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên ngoại ngữ</label>
                                <input type="text" class="form-control" name="tenNgoaiNgu" placeholder="Nhập tên ngoại ngữ" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Trình độ</label>
                                <input type="text" class="form-control" name="trinhDo" placeholder="Nhập trình độ" required>
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


