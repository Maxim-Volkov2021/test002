@extends('admin.layout.admin')
@section('title', "Додати запис")
@section('content')
    @include('admin.partial.header')
    <div class="content">
        @include('admin.cars.partial.car_create')
    </div>
@endsection
