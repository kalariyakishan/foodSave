@extends('backend.layouts.app')


@section('title','Create Admin')

@section('button')

<x-back-to-list href="{{ url('/admins') }}" />

@endsection 
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">Admin</h6>
      </div>

        <div class="card-body">

      <form action="{{ route('admins.store') }}" method="POST" class="user-form" enctype="multipart/form-data">
         @csrf
         @include('backend.admin.form', ['disable' => false])
      </form>
   </div>
</div>
@endsection