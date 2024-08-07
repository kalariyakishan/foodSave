@extends('backend.layouts.app')
{{-- @section('Breadcrumbs')
{{ Breadcrumbs::render('system-settings.countries') }}
@endsection --}}
@section('title','Food Size Setting')
@section('button')

@endsection
@section('main-content')
<div class="card border-top border-top-success rounded-top-0 custom-border-top">
    <table id="datatable" class="table display compact" style="width:100%">
        <thead>
            <tr class="bg-primary"> 
                <th>Name</th>
                <th>Price</th>
                <th>App Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        
    </table>
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
                    url: '{{ url('/food_sizes_datatable') }}',
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
            {data: 'price', name: 'price'},
            {data: 'app_price', name: 'app_price'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ],
        
    });
    });
</script>
@endpush
