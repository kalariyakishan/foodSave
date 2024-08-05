@extends('backend.layouts.app')
{{-- @section('Breadcrumbs')
{{ Breadcrumbs::render('system-settings.countries') }}
@endsection --}}
@section('title','Restaurants')
@section('button')
<x-create-link label="Add" href="{{ url('/restaurants/create') }}" />
@endsection
@section('main-content')
<div class="card border-top border-top-success rounded-top-0 custom-border-top">
    <table id="datatable" class="table display compact" style="width:100%">
        <thead>
            <tr class="bg-primary"> 
               <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
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
                    url: '{{ url('/restaurants_datatable') }}',
                    type: 'get',
                    beforeSend: function () {
                        //$(dark).block(loader);
                    },
                    complete: function (data) {
                        //$(dark).unblock();
                    }
                },
        columns: [
            {data: 'logo', name: 'logo',orderable: false,searchable:false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'action', name: 'action'},
        ],
        
    });
    });
</script>
@endpush
