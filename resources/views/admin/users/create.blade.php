@extends('admin.layout.admin')
@if(isset($admin))
    @section('title', "Створити адмін користувача")
@else
    @section('title', "Створити користувача")
@endif
@section('content')
    @include('admin.partial.header')
    <div class="content">
        @if(isset($admin))
            <h1>Створити адмін користувача</h1>
            <form action="{{route('admin.admin_user.store')}}" method="POST">
        @else
            <h1>Створити користувача</h1>
            <form action="{{route('admin.users.store')}}" method="POST">
        @endif
                @csrf
                <input name="name" type="text" placeholder="name"><br>
                @error('name')
                    <p>{{$message}}</p>
                @enderror

                <input name="email" type="text" placeholder="email"><br>
                @error('email')
                    <p>{{$message}}</p>
                @enderror

                <input name="password" type="text" placeholder="password"><br>
                @error('password')
                    <p>{{$message}}</p>
                @enderror

                <input type="submit">
        </form>
    </div>
@endsection
