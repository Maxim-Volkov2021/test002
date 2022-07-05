@extends('admin.layout.admin')

@if(isset($admin))
    @section('title', "Admin users")
@else
    @section('title', "Users")
@endif

@section('content')
    @include('admin.partial.header')
    <div class="content">
        @if(isset($admin))
            <h1>Список адмінів</h1>
            <a href="{{route('admin.admin_user.create')}}">Додати запис</a>
        @else
            <h1>Список користувачів</h1>
            <a href="{{route('admin.users.create')}}">Додати запис</a>
        @endif
        @include('admin.users.partial.users')
        {{$users->links()}}
    </div>
@endsection
