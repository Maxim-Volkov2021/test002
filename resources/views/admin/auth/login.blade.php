@extends('layout.base')
@section('title', "Login admin")
@section('content')

    <h1>Вхід для адмінів</h1>
    <form action="{{route('admin.login_process')}}" method="POST">
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
@endsection
