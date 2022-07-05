@extends('layout.base')
@section('title', $car->name)
@section('content')
    @include('partial.header')
    @include('cars.partial.car_show', ["car" => $car])
@endsection
