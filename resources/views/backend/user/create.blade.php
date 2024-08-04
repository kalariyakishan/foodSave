@extends('backend.layouts.app')


@section('title','Create User')

@section('button')

<x-back-to-list href="{{ url('/users') }}" />

@endsection 
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">User</h6>
      </div>

        <div class="card-body">

      <form action="{{ route('users.store') }}" method="POST" class="user-form" enctype="multipart/form-data">
         @csrf
         @include('backend.user.form', ['disable' => false])
      </form>
   </div>
</div>
@endsection