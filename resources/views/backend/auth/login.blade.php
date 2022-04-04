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
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet"/>

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
    <div class="page-content d-flex align-items-center justify-content-center">

<div class="row w-100 mx-0 auth-page">
  <div class="col-md-8 col-xl-6 mx-auto">
    <div class="card">
      <div class="row">
        <div class="col-md-4 pr-md-0">
          <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

          </div>
        </div>
        <div class="col-md-8 pl-md-0">
          <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2">Admin <span>Panel</span></a>
            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to admin panel.</h5>
            <form class="forms-sample" action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" data-validation="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" data-validation="required" placeholder="Password">
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Submit</button>
              </div>
              <!-- <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <!-- end common js -->
    <script>
    $.validate();
</script>
    @stack('custom-scripts')
</body>
</html>