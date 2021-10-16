
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->

  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/admins/components/content/index.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/admins/partials/header/header.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/admins/partials/sidebar/index.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/admins/partials/footer/index.css') }}">

  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('partials.header')
  @include('partials.sidebar')
    @yield('Content')
  @include('partials.footer')
</div>


{{-- <script src="{{ asset('adminLTE/admins/partials/header.js') }}"></script> --}}
<!-- ./wrapper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
{{-- <!-- Bootstrap 5 --> --}}
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bumdle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
{{-- <script src="{{ asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
{{-- <script src="{{ asset('adminLTE/dist/js/adminlte.js')}}"></script> --}}
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('adminLTE/admins/components/content/index.js')}}"></script>
<script src="{{ asset('adminLTE/admins/partials/header/header.js')}}"></script>
<script src="{{ asset('adminLTE/admins/partials/sidebar/index.js')}}"></script>
<script src="{{ asset('adminLTE/admins/partials/footer/index.js')}}"></script>

@yield('js')
</body>
</html>

