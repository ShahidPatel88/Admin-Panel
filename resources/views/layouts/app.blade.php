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
  <link href="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('public/css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->
  <style>
   
input[type=email]{
    border-radius: 8px;
}
input[type=password]{
    border-radius: 8px;
}
input[type=text]{
    border-radius: 8px;
}
button{
 border-radius: 8px !important; 
}
.card-body{
  border: 1px !important;
}
</style>
  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('public/assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page" style="background-color: white;">
      @yield('content')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>