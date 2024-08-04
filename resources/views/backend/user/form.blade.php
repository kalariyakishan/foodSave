
    
        
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Name" id="name"
                   value="{{ old('name', isset($user) ? $user->name : '') }}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" id="email"
                   value="{{ old('email', isset($user) ? $user->email : '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Total Savings:</label>
            <input type="number" class="form-control" name="total_savings" placeholder="Total Savings" id="total_savings" min="0"
                   value="{{ old('total_savings', isset($user) ? $user->total_savings : '') }}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Notification Enabled</label>
            <select class="form-control select" name="notifications_enabled" id="notifications_enabled">
                <option value="1" {{ old('notifications_enabled', isset($user) && $user->notifications_enabled == 1 ? 'selected' : '') }}>Enable</option>
                <option value="0" {{ old('notifications_enabled', isset($user) && $user->notifications_enabled == 0 ? 'selected' : '') }}>Disable</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Is Admin</label>
            <select class="form-control select" name="is_admin" id="is_admin">
                <option value="0" {{ old('is_admin', isset($user) && $user->is_admin == 0 ? 'selected' : '') }}>No</option>
                <option value="1" {{ old('is_admin', isset($user) && $user->is_admin == 1 ? 'selected' : '') }}>Yes</option>
            </select>
        </div>
    </div>
</div>


				

                <div class="text-end">
                	<button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            
	    
@push('js')
<script type="text/javascript">
    var baseUrl =  $('meta[name="base-url"]').attr('content');
    var email =  $("#email").val();
   

  $(document).ready(function(){

        
    $(".user-form").validateForm({
       rules: {
       	"name": {
	   		required: true,
	   	},
        "email": {
	   	required: true,
	   	remote: {
	   	  url: baseUrl+"/user/email",
	   	  type: "post",
	   	  data: {email:$(email).val(),_token:"{{ csrf_token() }}",user_id:'{{ isset($user) ? $user->id : '' }}'},
	   	  dataFilter: function (data) {
	   		  var json = JSON.parse(data);
	   		  if (json.msg == "true") {
	   			  return "\"" + "E-mail already in use" + "\"";
	   		  } else {
	   			  return 'true';
	   		  }
	   	  }
	     },
     },
	     "total_savings": {
	   		required: true,
	   	},
   
   
   },
   messages: {
	    'name': {
	   		required: "Name is required.",
	    },
	    'email': {
		   	required: "Email is required.",
		   	remote: "Email already in use!"  
	    },
	   'total_savings': {
	   		required: "Total Savings is required.",
	    },
	   }
    });
  });
</script>
@endpush