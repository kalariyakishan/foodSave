@extends('backend.layouts.app')

{{-- @section('Breadcrumbs')
{{ Breadcrumbs::render('system-settings.countries.show', $country->id) }}
@endsection --}}
@section('title','Restaurant')
@section('button')
<x-back-to-list href="{{ url('/restaurants') }}" />
@endsection
@section('main-content')
 
  <div class="card">
      <div class="card-header">
         <h6 class="mb-0">Restaurant Info</h6>
      </div>

        <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt>Name</dt>
                            <dd>{{ $restaurant->name }}</dd>
                            <dt>Email</dt>
                            <dd>{{ $restaurant->user->email ?? '' }}</dd>
                            <dt>Phone</dt>
                            <dd>{{ $restaurant->phone }}</dd>
                            <dt>Logo</dt>
                            <dd><x-image-preview url="{{ $restaurant->logo_path }}" class="col-md-3" id="image_logo" delete_url="" /></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt>Restaurant Stars</dt>
                            <dd>{{ $restaurant->stars }} Star</dd>
                            <dt>Restaurant Type</dt>
                            <dd>{{ $restaurant->restaurantType->name ?? '-' }}</dd>
                            <dt>Status</dt>
                            <dd>{{ $restaurant->status ? 'Active' : 'In-Active' }}</dd>
                            <dt>Banner Image</dt>
                            <dd><x-image-preview url="{{ $restaurant->banner_image_path }}" class="col-md-3" id="image_banner" delete_url="" /></dd>
                        </dl>
                    </div>
                </div>
           </div>
       </div>

       <div class="card">
      <div class="card-header">
         <h6 class="mb-0">Restaurant Address Info</h6>
      </div>

        <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt>Latitude</dt>
                            <dd>{{ $restaurant->latitude }}</dd>
                            <dt>Street</dt>
                            <dd>{{ $restaurant->street ?? '' }}</dd>
                            <dt>State</dt>
                            <dd>{{ $restaurant->state }}</dd>
                            <dt>Country</dt>
                            <dd>{{ $restaurant->country->name ?? '-' }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt>Longitude</dt>
                            <dd>{{ $restaurant->longitude }}</dd>
                            <dt>City</dt>
                            <dd>{{ $restaurant->city}}</dd>
                            <dt>Zip Code</dt>
                            <dd>{{ $restaurant->zip_code}}</dd>
                        </dl>
                    </div>
                </div>
           </div>
       </div>
   

   <div class="card">
      <div class="card-header">
         <h6 class="mb-0">Food Items</h6>
      </div>

        <div class="card-body">
            <table id="datatable" class="table display compact" style="width:100%">
        <thead>
            <tr class="bg-primary"> 
                <th>Name</th>
                <th>Description</th>
                <th>Daily Limit</th>
                <th>Food Type</th>
                <th>Price</th>
                <th>App Price</th>
                <th>Is Surprise</th>
                
            </tr>
        </thead>
        
    </table>
        </div>
        </div>     
@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        lengthMenu: [50, 75, 100 ],
       ajax: {
                    url: '{{ url('/food_items_datatable') }}/{{ $restaurant->id }}',
                    type: 'get',
                    beforeSend: function () {
                        //$(dark).block(loader);
                    },
                    complete: function (data) {
                        //$(dark).unblock();
                    }
                },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'daily_limit', name: 'daily_limit'},
            {data: 'food_type_id', name: 'food_type_id'},
            {data: 'price', name: 'price'},
            {data: 'app_price', name: 'app_price'},
            {data: 'is_surprise', name: 'is_surprise'},
        ],
        
    });
    });
</script>
@endpush
