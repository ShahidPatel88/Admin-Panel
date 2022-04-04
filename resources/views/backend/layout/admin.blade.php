<!DOCTYPE html>
<html>
<head>

  <title>SiliconFolder</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('public/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet"/>
  <link href="{{ asset('public/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet">
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('public/css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('public/assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    @include('backend.layout.partials.sidebar')
    <div class="page-wrapper">
      @include('backend.layout.partials.header')
      <div class="page-content">

        @yield('content')
      </div>
      @include('backend.layout.partials.footer')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <!-- end base js -->
    <script src="{{ asset('public/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('public/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->
    <!-- common js -->
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <script src="{{ asset('public/assets/js/sweet-alert.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootbox.min.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
    <script src="{{ asset('public/assets/js/global.js') }}"></script>
</body>
</html>
