@extends('backend.layouts.app')

@section('title')
Edit Admin
@endsection
@section('button')

<x-create-link href="{{ url('/admins/create') }}" />
<x-back-to-list href="{{ url('/admins') }}" />

@endsection
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">Admin</h6>
      </div>

        <div class="card-body">
<form action="{{ route('admins.update',$user->id) }}" method="POST" 
      class="user-form" 
      enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')

    @include('backend.admin.form', ['submitButtonText' => 'Update', 'disable' => true])

</form>
</div>
</div>
@endsection