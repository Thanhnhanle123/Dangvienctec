  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">CTEC<span class="brand-text-dangVien">DANGVIEN</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if ( !empty(Auth::user()->file_path) )
            <img src="{{  asset(Auth::user()->file_path) }}" class="img-circle elevation-2 avt" alt="User Image">
          @else
            <img src="{{  asset('adminLTE/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2 avt" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->tenNguoiDung}}</a>
        </div>

      </div>
        <img src="{{Auth::user()->file_path}}" alt="" id="avt_show">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('trangchu') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                        Trang chủ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-id-card-alt"></i>
                    <p>
                        Phụ trợ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item phutro-li">
                        <a href="{{ route('dantoc.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Dân tộc
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('tongiao.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Tôn giáo
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('thanhpho.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Thành phố
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('trinhdovanhoa.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Trình độ văn hóa
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('ngoaingu.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Ngoại ngữ
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('tinhoc.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Tin học
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('chucvu.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Chức vụ
                        </p>
                        </a>
                    </li>
                    <li class="nav-item phutro-li">
                        <a href="{{ route('chibo.danhsach') }}" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                        Chi bộ
                        </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('dangvien.danhsach') }}" class="nav-link">
                <i class="fas fa-users"></i>
                    <p>
                        Đảng viên
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-paper-plane"></i>
                    <p>
                        Hoạt động
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Đảng viên chuyển đến</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dangvienchuyendi.danhsach') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Đảng viên chuyển đi</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('quantrivien.danhsach') }}" class="nav-link">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Quản trị viên
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
