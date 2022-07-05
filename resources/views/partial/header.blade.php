<a href="{{route("home")}}">home</a>
@auth('web')
    <a href="{{route("logout")}}">Вийти</a>
@endauth
@guest('web')
    <a href="{{route("login")}}">Увійти</a>
@endguest


