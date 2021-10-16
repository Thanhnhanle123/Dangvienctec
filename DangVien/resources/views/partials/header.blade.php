<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('trangchu') }}" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://www.ctec.edu.vn/ctec/" class="nav-link" target="_blank">Liên hệ</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form action ="{{ route('sent_AI') }}" method="POST" class="w-100 me-3">
                <div class="search">
                    @csrf
                    <input class="input_timKiem" type="text" name="message" id="output" placeholder="Tìm kiếm.....">
                    <span onclick="runSpeechRecognition()" class="microphone" ><i class="fas fa-microphone"></i></span>
                    <button class="btn_timKiem" value = "submit" ><i class="fas fa-search"></i></button>
                    <br>
                    <span id="action"></span>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </li>
        <li class="nav-item">
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top:0.3rem">
                  <img src="{{ asset('adminLTE/dist/img/user1-128x128.jpg') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="margin-left: -7.7rem;
                margin-top: 0.7rem;">
                  <li><a class="dropdown-item" href="{{ route('dangvien.create') }}">Thêm đảng viên</a></li>
                  <li><a class="dropdown-item" href="{{ route('quantrivien.info',['id' => Auth::user()->id]) }}">Chỉnh sữa cá nhân</a></li>
                  {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                </ul>
            </div>
        </li>
    </ul>
  </nav>

  <!-- /.navbar -->
