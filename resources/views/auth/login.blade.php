@extends('backend.layouts.authLayout')

@section('main-content')
<!-- Login form -->
  <form class="login-form" action="{{url('/login')}}" method="post">
    {{csrf_field()}}

    <div class="card mb-0">
      <div class="card-body">
        <div class="text-center mb-3">
          <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
            <img src="{!! asset('bs5/assets/images/logo_icon.svg') !!}" class="h-48px" alt="">
          </div>
          <h5 class="mb-0">Login to your account</h5>
          <span class="d-block text-muted">Enter your credentials below</span>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <div class="form-control-feedback form-control-feedback-start">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <div class="form-control-feedback-icon">
              <i class="ph-user-circle text-muted"></i>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <div class="form-control-feedback form-control-feedback-start">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="form-control-feedback-icon">
              <i class="ph-lock text-muted"></i>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>

        <div class="row mb-3">
          <div class="col-sm-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberCheckbox" checked>
              <label class="form-check-label" for="rememberCheckbox">
                Remember
              </label>
            </div>
          </div>

          <div class="col-sm-6 text-sm-end">
            <a href="{{ route('password.request') }}">Forgot password?</a>
          </div>
        </div>



      </div>
    </div>
  <div class="text-center mt-3">
  Download the Food Save App for your mobile
  <div class="row justify-content-center">
    <div class="col-md-6">
      <a href="/" target="_blank">
        <img src="{{ asset('bs5/assets/images/google_play.png') }}" alt="Google Play" height="40px" width="120px">
      </a>
    </div>
    <div class="col-md-6">
      <a href="/" target="_blank">
        <img src="{{ asset('bs5/assets/images/apple_ios.png') }}" alt="Apple iOS" height="40px" width="120px">
      </a>
    </div>
  </div>
</div>
  </form>







  <!-- /login form -->

          



          @endsection

          @push('js')
          <script>
            $(document).ready(function(){
    @if(Session::get('errors')||count( $errors ) > 0)
      @foreach ($errors->all() as $error)
      toastr.options = {
        "closeButton": true,
        "progressBar": true 
      }
      toastr.warning("{{$error}}");
        @endforeach
    @endif

    $(".login-form").validateForm({
      rules: {
        "email": {
          required: true,
          email: true,
        },
        "password": {
          required: true,
        },
        
        
      },
      messages: {
        'email': {
          required: "Email is required.",
          email: "Enter a valid Email",
        },
        'password': {
          required: "Password is required.",
        },     
      },
    });
});

          </script>
          @endpush