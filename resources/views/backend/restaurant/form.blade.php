
<input type="hidden" name="is_user" value="restaurant">    
        
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" id="name"
                   value="{{ old('name', isset($restaurant) ? $restaurant->name : '') }}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                   value="{{ old('email', isset($restaurant) ? $restaurant->user->email : '') }}">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Password (<span class="text-sm">if you want change password then enter</span>)</label>
            <input type="text" class="form-control" name="password" placeholder="Password" id="password"
                   value="{{ old('password') }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone"
                   value="{{ old('phone', isset($restaurant) ? $restaurant->phone : '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" class="form-control" name="latitude" placeholder="Latitude" id="latitude"
                   value="{{ old('latitude', isset($restaurant) ? $restaurant->latitude : '') }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" class="form-control" name="longitude" placeholder="Longitude" id="longitude"
                   value="{{ old('longitude', isset($restaurant) ? $restaurant->longitude : '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Street</label>
            <input type="text" class="form-control" name="street" placeholder="Street" id="street"
                   value="{{ old('street', isset($restaurant) ? $restaurant->street : '')}}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" placeholder="City" id="city"
                   value="{{ old('city', isset($restaurant) ? $restaurant->city : '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label">State</label>
            <input type="text" class="form-control" name="state" placeholder="State" id="state"
                   value="{{ old('state', isset($restaurant) ? $restaurant->state : '') }}">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label">Zip Code</label>
            <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" id="zip_code"
                   value="{{ old('zip_code', isset($restaurant) ? $restaurant->zip_code : '') }}">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" name="country" placeholder="Country" id="country"
                   value="{{ old('country', isset($restaurant) ? $restaurant->country : '') }}">
        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-6">
    <div class="mb-3">
        <label class="form-label">Restaurant Stars</label>
        <select class="form-control select" name="stars" id="stars">
            <option value="1" {{ old('stars', isset($restaurant) && $restaurant->stars == 1 ? 'selected' : '') }}>1 Star</option>
            <option value="2" {{ old('stars', isset($restaurant) && $restaurant->stars == 2 ? 'selected' : '') }}>2 Star</option>
            <option value="3" {{ old('stars', isset($restaurant) && $restaurant->stars == 3 ? 'selected' : '') }}>3 Star</option>
            <option value="4" {{ old('stars', isset($restaurant) && $restaurant->stars == 4 ? 'selected' : '') }}>4 Star</option>
            <option value="5" {{ old('stars', isset($restaurant) && $restaurant->stars == 5 ? 'selected' : '') }}>5 Star</option>
        </select>
    </div>
</div>

</div>
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
    <label class="form-label">Logo</label>
    
    <div class="form-control-feedback form-control-feedback-start">
        <input type="file" 
               name="logo" 
               id="logo" 
               accept="image/png" 
               class="file-input">
    </div>
</div>
    </div>
    <div class="col-lg-6">
        @if(isset($restaurant) && $restaurant->logo != '')
            <x-image-preview url="{{ $restaurant->logo_path }}" class="col-md-6" id="image_logo" delete_url="" />
        @endif
    </div>
</div>
				

                <div class="text-end">
                	<button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/lightview/lightview.css')}}"  async />
@endpush
@push('script')
<script src="{!! asset('bs5/assets/js/vendor/uploaders/fileinput/fileinput.min.js') !!}"></script>
<script src="{!! asset('bs5/assets/js/vendor/uploaders/fileinput/plugins/sortable.min.js') !!}"></script>
<script type="text/javascript" src="{{asset('assets/js/lightview/lightview.js')}}"></script>
@endpush
@push('js')
<script type="text/javascript">
    var baseUrl =  $('meta[name="base-url"]').attr('content');
    var email =  $("#email").val();
   

  $(document).ready(function(){

    $('#logo').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="ph-file-plus me-2"></i>',
            uploadIcon: '<i class="ph-file-arrow-up me-2"></i>',
            removeIcon: '<i class="ph-x fs-base me-2"></i>',
            layoutTemplates: {
                icon: '<i class="ph-check"></i>'
            },
            uploadClass: 'btn btn-light',
            removeClass: 'btn btn-light',
            initialCaption: "No file selected",
            showUpload: false,
            showPreview: false,
        });

        
    $(".restaurant-form").validateForm({
       rules: {
        "name": {
            required: true,
        },
        "email": {
            required: true,
            email: true,
            remote: {
                url: baseUrl + "/user/email",
                type: "post",
                data: {
                    email: function() {
                        return $("#email").val();
                    },
                    _token: "{{ csrf_token() }}",
                    user_id: '{{ isset($restaurant) ? $restaurant->user->id : '' }}'
                },
                dataFilter: function(data) {
                    var json = JSON.parse(data);
                    if (json.msg == "true") {
                        return "\"" + "E-mail already in use" + "\"";
                    } else {
                        return 'true';
                    }
                }
            }
        },
        "phone": {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 15
        },
        "latitude": {
            required: true,
            number: true
        },
        "longitude": {
            required: true,
            number: true
        },
        "street": {
            required: true,
        },
        "city": {
            required: true,
        },
        "state": {
            required: true,
        },
        "zip_code": {
            required: true,
            digits: true,
            minlength: 5,
            maxlength: 10
        },
        "country": {
            required: true,
        },
        "stars": {
            required: true,
        },
       
    },
    messages: {
        'name': {
            required: "Name is required.",
        },
        'email': {
            required: "Email is required.",
            email: "Please enter a valid email address.",
            remote: "Email already in use!"
        },
        'password': {
            required: "Password is required.",
            minlength: "Password must be at least 6 characters long."
        },
        'phone': {
            required: "Phone number is required.",
            digits: "Please enter a valid phone number.",
            minlength: "Phone number must be at least 10 digits.",
            maxlength: "Phone number cannot exceed 15 digits."
        },
        'latitude': {
            required: "Latitude is required.",
            number: "Please enter a valid latitude."
        },
        'longitude': {
            required: "Longitude is required.",
            number: "Please enter a valid longitude."
        },
        'street': {
            required: "Street is required.",
        },
        'city': {
            required: "City is required.",
        },
        'state': {
            required: "State is required.",
        },
        'zip_code': {
            required: "Zip Code is required.",
            digits: "Please enter a valid Zip Code.",
            minlength: "Zip Code must be at least 5 digits.",
            maxlength: "Zip Code cannot exceed 10 digits."
        },
        'country': {
            required: "Country is required.",
        },
        'stars': {
            required: "Please select a star rating for the restaurant.",
        },
        'logo': {
            accept: "Only image files are allowed."
        }
    }
    });
  });
</script>
@endpush