@extends('backend.layouts.app')


@section('title','Create Restaurant')

@section('button')

<x-back-to-list href="{{ url('/restaurants') }}" />

@endsection 
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">Restaurant</h6>
      </div>

        <div class="card-body">

      <form action="{{ route('restaurants.store') }}" method="POST" class="restaurant-form" enctype="multipart/form-data">
         @csrf
         @include('backend.restaurant.form', ['disable' => false])
      </form>
   </div>
</div>
@endsection