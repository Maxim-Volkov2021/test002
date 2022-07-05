@extends('admin.layout.admin')
@section('title', $car->name)
@section('content')
    @include('admin.partial.header')
    <div class="content">
        @include('admin.cars.partial.car_update')
    </div>
@endsection
