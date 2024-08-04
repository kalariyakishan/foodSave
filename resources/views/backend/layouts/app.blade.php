<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta http-equiv="x-pjax-version" content="v123">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{url('/')}}">
	<meta name="local" content="en">
	{{-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0" /> --}}
	<meta http-equiv="Content-Type" content="text/html; charset=big5">
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>{{ config('app.name') }}</title>

	<!-- Global stylesheets -->
	<link href="{!! asset('bs5/assets/fonts/inter/inter.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('bs5/assets/icons/phosphor/styles.min.css') !!}" rel="stylesheet" type="text/css">
	<link href="{!! asset('bs5/page_assets/css/ltr/all.min.css') !!}" id="stylesheet" rel="stylesheet" type="text/css">
	<link href="{!! asset('bs5/assets/icons/icomoon/styles.min.css') !!}" rel="stylesheet" type="text/css">
	<!-- <link href="{!! asset('bs5/assets/icons/fontawesome/all.css') !!}" rel="stylesheet" type="text/css"> -->
    <link href="{!! asset('bs5/assets/icons/fontawesome/fontawesome.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('bs5/assets/icons/fontawesome/brands.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('bs5/assets/icons/fontawesome/solid.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('bs5/assets/icons/fontawesome/regular.css') !!}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="{!! asset('bs5/assets/css/custom-style.css') !!}" rel="stylesheet" type="text/css">
	
	<!-- /global stylesheets -->
	@stack('css')

	<!-- Core JS files -->
	<script src="{!! asset('bs5/assets/demo/demo_configurator.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/bootstrap/bootstrap.bundle.min.js') !!}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{!! asset('bs5/assets/js/jquery/jquery.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/icons/fontawesome/all.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/forms/validation/validate.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/forms/selects/select2.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/forms/selects/form_select2.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/forms/components_tooltips.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/tables/datatables/datatables.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/tables/datatables/extensions/buttons.min.js') !!}"></script>
	<script src="{!! asset('bs5/assets/js/vendor/notifications/bootbox.min.js') !!}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@stack('script')

	<script src="{!! asset('bs5/page_assets/js/app.js') !!}"></script>
	<script type="text/javascript">
	 // Setting datatable defaults
    $.extend( true, $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
           
            paginate: { 'first': 'First', 'last': 'Last', 'next': document.dir == "rtl" ? '&larr;' : '&rarr;', 'previous': document.dir == "rtl" ? '&rarr;' : '&larr;' },
        },
        buttons: {
              dom: {
                  button: {
                      className: 'btn btn-light'
                  }
              },
              buttons: [
                  {extend: 'copy',text: '<i class="icon-copy3 position-left"></i> Copy'},
                  {extend: 'csv',text: '<i class="icon-file-spreadsheet position-left"></i> CSV'},
                  {extend: 'excel',text: '<i class="icon-file-excel position-left"></i> Excel'},
                  //{extend: 'pdf'},
                  //{extend: 'print'}
              ]
          },

          initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        },
    });

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
		       	console.log(element,error);
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
    function confirmDelete(url, datatable,title="Delete Confirmation",message="Are you sure you want to delete this record") {

    	bootbox.confirm({
                 title: title,
                 message: message,
                 buttons: {
                     cancel: {
                         label: 'Close',
                         className: 'btn-link'
                     },
                     confirm: {
                         label: 'Delete Record',
                         className: 'btn-danger'
                     }
                 },
                 callback: function(result) {
                 	
                     if (result) {
                         $.ajax({
			                url: url,
			                type: 'DELETE',
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                },
			                success: function(data) {
			                    // Handle the response data, if needed
			                    console.log(data);
			                    // For example, you can show a success message or refresh the DataTable
			                    // Call the function to reload the DataTable after successful deletion
			                    toastr.success(data.message);
			                    $(datatable).DataTable().ajax.reload();
			                },
			                error: function(jqXHR, textStatus, errorThrown) {
			                    // Handle any error that might occur during the AJAX request
			                    console.error(errorThrown);
			                }
			            });
                     }
                 }
             });
	}

	function confirmImageDelete(url,remove_div_id,title="Delete Image Confirmation",message="Are you sure you want to delete this image?") {
		bootbox.confirm({
                 title: title,
                 message: message,
                 buttons: {
                     cancel: {
                         label: 'Close',
                         className: 'btn-link'
                     },
                     confirm: {
                         label: 'Delete',
                         className: 'btn-danger'
                     }
                 },
                 callback: function(result) {
                 	if (result) {
                         $.ajax({
			                url: url,
			                type: 'POST',
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                },
			                success: function(data) {
			                    
			                    toastr.success(data.message);
			                    $('#'+remove_div_id).remove();
			                },
			                error: function(jqXHR, textStatus, errorThrown) {
			                  
			                    console.error(errorThrown);
			                }
			            });
                     }
                 	}
             });
	}

	@if(Session::get('message'))
      toastr.options = {
        "closeButton": true,
        "progressBar": true 
      }
      toastr.success("{{Session::get('message')}}");
    @endif

	</script>
	<!-- /theme JS files -->
	@stack('js')

</head>


<body>

	<!-- Main navbar -->
	@include('backend.layouts.main-navbar')
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('backend.layouts.main-sidebar')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				@include('backend.layouts.page-header')
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					@section('main-content')
					@show
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
