@extends('layout.base')
@section('title', "Welcom")
@section('content')

    {{"Це головна сторінка"}}
    @include('partial.header')
    @include('cars.partial.cars', ["cars" => $cars])
    <a href="{{route('cars_index')}}">Дивитися більше</a>
@endsection
