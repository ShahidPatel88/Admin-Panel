@extends('layouts.app')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card rounded-3">
        <div class="card-body p-4 p-sm-5">
          <div class="card-title text-center py-2">
                    <img src="{{ asset('public/assets/images/logo.svg') }}" width="200px">
          </div>
          @include('backend.partials.error')
          <div class="col-md-12">
            <div class="auth-form-wrapper">
              <form class="forms-sample" action="{{ route('register') }}" method="post" id="register-form">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Full name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="FullName" name="name">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password">
                </div>
                
                  <div class="form-check form-check-flat form-check-primary" style="padding-left: 12px !important">
                    <div class="row">
                    <div class="col-md-1">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="checkterms">
                      </label>
                    </div>
                    <div class="col-md-11" style="padding-left: 0px !important">
                      <span style="color: gray !important;"> By clicking signup you agree on the <a href="https://siliconfolder.com/terms-and-conditions/" target="_blank" style="color: gray !important;text-decoration: underline;"> terms and conditions</a></span>
                    </div>
                    <label id="checkterms-error" class="error mt-2 text-danger" for="checkterms"></label>
                    </div>
                </div>
              
        
                </div>
                  

                <div class="mt-3">
                  <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Sign up with twitter
                  </button> -->
                  <button type="submit" class="btn btn-primary form-control mr-2 mb-2 mb-md-0">
                    Sign up
                  </button>
                </div>
                <!-- <a href="{{ route('login')}}" class="d-block mt-3 text-muted">Already a user? Sign in</a> -->
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>

</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  
@endpush
@push('custom-scripts')
  <script>
    $(function() {
  'use strict';

  $.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    }
  });
  $(function() {
    // validate signup form on keyup and submit
    
    $("#register-form").validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
        },
         checkterms: {
          required: true,
        },
         password: {
          required: true,
        },
      },
      messages: {
        
        name: {
          required: "Please provide a full name",
        },
        email: {
          required: "Please provide a email",
        },
        password: {
          required: "Please provide a password",
        },
        checkterms: {
          required: "Please accept terms & condition",
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
  });
});
  </script>
@endpush