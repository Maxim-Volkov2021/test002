@extends('layout.base')
@section('title', "Password recover")
@section('content')
    <h1>Відновлення пароля</h1>
    <form action="{{route('password_recover_process')}}" method="POST">
        @csrf
        <ul>
            <li><input name="email" type="text" placeholder="example@example.com"></li>
            @error('email')
                <p>{{$message}}</p>
            @enderror
            <li><input type="submit" ></li>
        </ul>
    </form>
@endsection
