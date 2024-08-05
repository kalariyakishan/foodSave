@extends('backend.layouts.app')

@section('title')
Edit Restaurant
@endsection
@section('button')

<x-create-link href="{{ url('/restaurants/create') }}" />
<x-back-to-list href="{{ url('/restaurants') }}" />

@endsection
@section('main-content')
<div class="card">
      <div class="card-header">
         <h6 class="mb-0">Restaurant</h6>
      </div>

        <div class="card-body">
<form action="{{ route('restaurants.update',$restaurant->id) }}" method="POST" 
      class="restaurant-form" 
      enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')

    @include('backend.restaurant.form', ['submitButtonText' => 'Update', 'disable' => true])

</form>
</div>
</div>
@endsection