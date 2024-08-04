@extends('backend.layouts.authLayout')    
@section('main-content')


<form class="login-form" method="POST" action="{{ url('/password/email ') }}">
    {{ csrf_field() }}
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <div class="d-inline-flex bg-primary bg-opacity-10 text-primary lh-1 rounded-pill p-3 mb-3 mt-1">
                    <i class="ph-arrows-counter-clockwise ph-2x"></i>
                </div>
                <h5 class="mb-0">Password Recovery</h5>
                <span class="d-block text-muted">Password Recovery</span>
            </div>

            <div class="mb-3">
                <div class="form-control-feedback form-control-feedback-start">
                    @if(isset($users))
                      <input type="email" placeholder="Email Address" class="form-control" name="email" value="{{$users->email}}">
                    @else
                    <input  type="email" placeholder="Email Address"class="form-control" name="email" value="{{old('email')}}">
                    @endif
                    <div class="form-control-feedback-icon">
                        <i class="ph-at text-muted"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="ph-arrow-counter-clockwise me-2"></i>
                Reset Password
            </button>
        </div>
    </div>
</form>



@endsection


@push('js')
          <script>
            $(document).ready(function(){

                $(".login-form").validateForm({
      rules: {
        "email": {
          required: true,
          email: true,
        },
       
        
        
      },
      messages: {
        'email': {
          required: "Email is required.",
          email: "Enter a valid Email",
        },
      
      },
    });
});
</script>
@endpush