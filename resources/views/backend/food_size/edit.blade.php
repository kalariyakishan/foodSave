@extends('backend.layouts.app')

@section('title')
Edit Food Size Setting
@endsection
@section('button')

<x-back-to-list href="{{ url('/food_sizes') }}" />

@endsection
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">Food Size Setting</h6>
      </div>

        <div class="card-body">
<form action="{{ route('food_sizes.update',$food_size->id) }}" method="POST" 
      class="food_size-form" 
      enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')


<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" id="name"
                   value="{{ old('name', isset($food_size) ? $food_size->name : '') }}">
        </div>
    </div>

    <div class="col-lg-6">
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control select" name="status" id="status">
            <option value="1" {{ old('status', isset($food_size) && $food_size->status == 1 ? 'selected' : '') }}>Active</option>
            <option value="0" {{ old('status', isset($food_size) && $food_size->status == 0 ? 'selected' : '') }}>In-Active</option>
        </select>
    </div>
</div>

</div>

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" placeholder="price" id="price"
                   value="{{ old('price', isset($food_size) ? $food_size->price : '') }}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="app_price" placeholder="app_price" id="app_price"
                   value="{{ old('app_price', isset($food_size) ? $food_size->app_price : '') }}">
        </div>
    </div>

</div>

<div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>

</form>
</div>
</div>
@endsection

@push('js')
<script type="text/javascript">
      $(document).ready(function(){
            $.validator.addMethod("validPrice", function(value, element) {
        return this.optional(element) || /^\d+(\.\d{1,2})?$/.test(value);
    }, "Please enter a valid price (up to 2 decimal places).");

      $.validator.addMethod("appPriceNotGreaterThanPrice", function(value, element) {
        var price = parseFloat($('#price').val());
        var appPrice = parseFloat(value);
        return this.optional(element) || appPrice <= price;
    }, "App price must not be greater than the price.");

            $(".food_size-form").validateForm({
       rules: {
            "name": {
                  required: true,
            },
           "price": {
                required: true,
                number: true,
                validPrice: true,
                min: 0.01 // Minimum price value (optional)
            },
            "app_price": {
                required: true,
                number: true,
                validPrice: true,
                appPriceNotGreaterThanPrice: true
            }
   
   
   },
   messages: {
          'name': {
                  required: "Name is required.",
          },
         "price": {
                required: "Price is required.",
                number: "Please enter a valid number.",
                validPrice: "Price must be a valid number with up to 2 decimal places.",
                min: "Price must be at least 0.01."
            },
             "app_price": {
                required: "App price is required.",
                number: "Please enter a valid number.",
                validPrice: "App price must be a valid number with up to 2 decimal places.",
                appPriceNotGreaterThanPrice: "App price must not be greater than the price."
            }
         }
    });

      });
</script>
@endpush