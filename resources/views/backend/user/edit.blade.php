@extends('backend.layouts.app')

@section('title')
Edit User
@endsection
@section('button')

<x-create-link href="{{ url('/user/create') }}" />
<x-back-to-list href="{{ url('/users') }}" />

@endsection
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">User</h6>
      </div>

        <div class="card-body">
<form action="{{ route('users.update',$user->id) }}" method="POST" 
      class="user-form" 
      enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')

    @include('backend.user.form', ['submitButtonText' => 'Update', 'disable' => true])

</form>
</div>
</div>
@endsection