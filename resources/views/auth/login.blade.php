@extends('layout.base')
@section('title', "Login")
@section('content')

    <h1>Вхід</h1>
    <form action="{{route('login_process')}}" method="POST">
        @csrf
        <ul>
            <li><input name="email" type="text" placeholder=""></li>
            @error('email')
                <p>{{$message}}</p>
            @enderror

            <li><input name="password" type="text" placeholder=""></li>
            @error('password')
                <p>{{$message}}</p>
            @enderror

            <li><input type="submit"></li>
        </ul>
    </form>
    <ul>
        <li><a href="{{route('register')}}">Регістрація</a></li>
        <li><a href="{{route('password_recover')}}">Забув пароль?</a></li>
    </ul>
@endsection
