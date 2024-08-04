<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="{!! asset('bs5/assets/fonts/inter/inter.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('bs5/assets/icons/phosphor/styles.min.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('bs5/page_assets/css/ltr/all.min.css') !!}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{!! asset('bs5/assets/demo/demo_configurator.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/bootstrap/bootstrap.bundle.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/ui/prism.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/jquery/jquery.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/forms/validation/validate.min.js') !!}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{!! asset('bs5/page_assets/js/app.js') !!}"></script>
	<!-- /theme JS files -->

	<script type="text/javascript">
		(function($) {
    $.fn.extend({
        validateForm: function(options) {
            var defaults = {
                ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
		       errorClass: 'validation-invalid-label',
		       successClass: 'validation-valid-label',
		       validClass: 'validation-valid-label',
		       highlight: function (element, errorClass) {
		       $(element).removeClass(errorClass);
		       },
		       unhighlight: function (element, errorClass) {
		       $(element).removeClass(errorClass);
		       },
		       success: function(label) {
		                label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
		            },

		       // Different components require proper error label placement
		       errorPlacement: function (error, element) {
		       // Styled checkboxes, radios, bootstrap switch
		       if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent()
		         .hasClass('bootstrap-switch-container')) {
		         if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass(
		             'radio-inline')) {
		           error.appendTo(element.parent().parent().parent().parent());
		         } else {
		           error.appendTo(element.parent().parent().parent().parent().parent());
		         }
		       }
		       // Unstyled checkboxes, radios
		       else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
		         error.appendTo(element.parent().parent().parent());
		       }
		   
		       // Input with icons and Select2
		       else if (element.parents('div').hasClass('form-control-feedback') || element.hasClass('select2-hidden-accessible')) {
		         error.appendTo(element.parent());
		       }
		       // Inline checkboxes, radios
		       else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass(
		           'radio-inline')) {
		         error.appendTo(element.parent().parent());
		       }
		       // Input group, styled file input
		       else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
		         error.appendTo(element.parent().parent());
		       } else {
		         error.insertAfter(element);
		       }
		       },
                rules: {},
                messages: {}
            };

            var settings = $.extend({}, defaults, options);

            return this.each(function() {
                $(this).validate({
                    errorClass: settings.errorClass,
                    successClass: settings.successClass,
                    highlight: settings.highlight,
                    unhighlight: settings.unhighlight,
                    errorPlacement: settings.errorPlacement,
                    rules: settings.rules,
                    messages: settings.messages
                });
            });
        }
    });


})(jQuery);
	</script>

	@stack('js')

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-dark navbar-static py-2">
		<div class="container-fluid">
			<div class="navbar-brand">
				<a href="index.html" class="d-inline-flex align-items-center">
					<img src="{!! asset('bs5/assets/images/logo_icon.svg') !!}" alt="">
					<img src="{!! asset('bs5/assets/images/logo_text_light.svg') !!}" class="d-none d-sm-inline-block h-16px ms-3" alt="">
				</a>
			</div>

			<div class="d-flex justify-content-end align-items-center ms-auto">
				<ul class="navbar-nav flex-row">
					
					@if(!Request::is('/login'))
					<li class="nav-item">
						<a href="{{ route('login') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-user-circle"></i>
							<span class="d-none d-md-inline-block ms-2">Login</span>
						</div>
						</a>
					</li> 
					@endif
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

					

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login form -->
					@section('main-content')
					@show
					<!-- /login form -->

				</div>
				<!-- /content area -->


				<!-- Footer -->
				@include('backend.layouts.footer')
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
