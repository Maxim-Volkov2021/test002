<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>options</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if(isset($admin))
                    <a href="{{route('admin.admin_user.edit', $user->id)}}">Редагувати</a>
                    <form action="{{route('admin.admin_user.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Видалити</button>
                    </form>
                @else
                    <a href="{{route('admin.users.edit', $user->id)}}">Редагувати</a>
                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Видалити</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>

