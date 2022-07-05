@extends('admin.layout.admin')
    @section('title', "Admin cars")
    @section('content')
        @include('admin.partial.header')
        <div class="content">
            <h1>Список машин</h1>
            <a href="{{route('admin.cars.create')}}">Додати запис</a>
            @include('admin.cars.partial.cars', ["cars" => $cars])
            {{$cars->links()}}
        </div>
@endsection
