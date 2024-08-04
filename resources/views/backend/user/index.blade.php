@extends('backend.layouts.app')
{{-- @section('Breadcrumbs')
{{ Breadcrumbs::render('system-settings.countries') }}
@endsection --}}
@section('title','Users')
@section('button')
<x-create-link label="Add" href="{{ url('/users/create') }}" />
@endsection
@section('main-content')
<div class="card border-top border-top-success rounded-top-0 custom-border-top">
    <table id="datatable" class="table display compact" style="width:100%">
        <thead>
            <tr class="bg-primary"> 
               <th>Avtar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Savings</th>
                <th>Notifications Enabled</th>
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
                    url: '{{ url('/users_datatable') }}',
                    type: 'get',
                    beforeSend: function () {
                        //$(dark).block(loader);
                    },
                    complete: function (data) {
                        //$(dark).unblock();
                    }
                },
        columns: [
            {data: 'avatar', name: 'avatar',orderable: false,searchable:false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'total_savings', name: 'total_savings'},
            {data: 'notifications_enabled', name: 'notifications_enabled'},
            {data: 'action', name: 'action'},
        ],
        
    });
    });
</script>
@endpush
