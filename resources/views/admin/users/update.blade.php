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
            <h1>Редагувати адмін користувача з ID {{$user->id}}</h1>
        @else
            <h1>Редагувати користувача з ID {{$user->id}}</h1>
        @endif
        <ul>
            @if(isset($admin))
                <form action="{{route('admin.admin_user.update', $user->id)}}" method="POST">
            @else
                <form action="{{route('admin.users.update', $user->id)}}" method="POST">
            @endif
                @csrf
                @method('PUT')
                <li><p>Name:</p><input name="name" type="text" placeholder="name" value="{{$user->name}}"></li>
                @error('name')
                    <p>{{$message}}</p>
                @enderror
                <li><p>Email:</p><input name="email" type="text" placeholder="email" value="{{$user->email}}"></li>
                @error('email')
                    <p>{{$message}}</p>
                @enderror
                <li><p>Password:</p><input name="password" type="text" placeholder="password" value=""><br>
                <li><p>Помітка!
                    Якщо в паролі нічого не писати пароль залишиться тим самим
                </p></li>
                <li><input type="submit"></li>
            </form>
        </ul>
    </div>
@endsection
