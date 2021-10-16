@extends('layouts.admin')

@section('title')
    Quản trị viên
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/quantrivien/index.css') }}">
@endsection

@section('Content')
    <div class="content-wrapper">
    @include('partials.content_header',['name' => 'Quản trị viên', 'title' => 'danh sách','route' => 'quantrivien.danhsach'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="inDam">Danh sách</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="canGiua">STT</th>
                                                <th scope="col">Tên đăng nhập</th>
                                                <th scope="col">mật khẩu</th>
                                                <th scope="col">Tên người dùng</th>
                                                <th scope="col">Ảnh đại diện</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col" class="canGiua">Sữa</th>
                                                <th scope="col" class="canGiua">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach ($user as $u)
                                            <tr>
                                                <th scope="row" class="canGiua">{{$i}}</th>
                                                <td>{{$u->userName}}</td>
                                                <td>{{$u->password_show}}</td>
                                                <td>{{$u->tenNguoiDung}}</td>
                                                <td>
                                                    <img src="{{$u->file_path}}" alt="Ảnh đại diện" class="avt">
                                                </td>
                                                <td class="">
                                                    {{ $tam = Auth()->id() == $u->id ? "Đang đăng nhập" : " "}}
                                                </td>
                                                <td class="canGiua">
                                                    <a class="btn btn-primary" href="{{ route('quantrivien.edit',['id' => $u->id]) }}"><i class="fas fa-edit"></i></a>
                                                </td>
                                                <td class="canGiua">
                                                    <a class="btn btn-danger action_delete" data-url="{{ route('quantrivien.delete',['id' => $u->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {{$user->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="inDam">Thêm quản trị viên</h3>
                            </div>
                            <div class="col-lg-9">
                                <form action="{{ route('quantrivien.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">user name</label>
                                        <input type="text" class="form-control" name="userName" placeholder="Nhập mã quản trị viên" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">mật khẩu quản trị viên</label>
                                        <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu quản trị viên" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tên người dùng</label>
                                        <input type="text" class="form-control" name="tenNguoiDung" placeholder="Nhập tên người dùng" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" class="form-control-file" name="file_anh">
                                    </div>
                                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        <!-- /.content -->
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
{{-- <script rel="stylesheet" src="{{ asset('adminLTE/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script>
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    console.log(myDropzone);
    </script> --}}
@endsection




