@extends('layout.base')
@section('title', "Login")
@section('content')
    <h1>Регістрація</h1>
    <form action="{{route('register_process')}}" method="POST">
        @csrf
        <ul>
            <li><input name="name" type="text" placeholder="Ведіть ім'я"></li>
            @error('name')
                <p>{{$message}}</p>
            @enderror
            <li><input name="email" type="text" placeholder="Ведіть email"></li>
            @error('email')
                <p>{{$message}}</p>
            @enderror
            <li><input name="password" type="password" placeholder="Ведіть пароль"></li>
            <li><input name="password_confirmation" type="password" placeholder="Підтвердіть пароль"></li>
            @error('password')
                <p>{{$message}}</p>
            @enderror
            <li><input type="submit"></li>
        </ul>
    </form>
    <ul>
        <li><a href="{{route('register')}}">Регістрація</a></li>
    </ul>
@endsection
