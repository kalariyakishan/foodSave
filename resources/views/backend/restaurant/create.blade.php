@extends('backend.layouts.app')


@section('title','Create Restaurant')

@section('button')

<x-back-to-list href="{{ url('/restaurants') }}" />

@endsection 
@section('main-content')


      <form action="{{ route('restaurants.store') }}" method="POST" class="restaurant-form" enctype="multipart/form-data">
         @csrf
         @include('backend.restaurant.form', ['disable' => false])
      </form>

@endsection