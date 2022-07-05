@extends('layout.base')
@section('title', "Cars")
@section('content')
    @include('partial.header')
    @include('cars.partial.cars', ["cars" => $cars])
    {{$cars->links()}}
@endsection
