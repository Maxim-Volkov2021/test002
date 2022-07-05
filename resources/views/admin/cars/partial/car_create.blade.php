<ul>
    <form action="{{route("admin.cars.store")}}" method="POST" enctype="multipart/form-data">
        @csrf

        <li>name: <input name="name" type="text" value=""></li>
        @error('name')
            <p>{{$message}}</p>
        @enderror

        <li>mark:
            <select name="mark_id">
                @foreach($marks as $mark)
                    <option value="{{$mark->id}}">{{$mark->name}}</option>
                @endforeach
            </select></li>
        @error('mark_id')
            <p>{{$message}}</p>
        @enderror

        <li>user_id:
            <select name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select></li>
        @error('user_id')
            <p>{{$message}}</p>
        @enderror

        <li>year: <input name="year" type="number" value=""></li>
        @error('year')
            <p>{{$message}}</p>
        @enderror

        <li>probig: <input name="probig" type="number" value=""></li>
        @error('probig')
            <p>{{$message}}</p>
        @enderror

        <li>description: <textarea name="description" rows="5" cols="50"></textarea></li>
        @error('description')
            <p>{{$message}}</p>
        @enderror

        <li>image: <input name="image" type="file"></li>
        @error('image')
            <p>{{$message}}</p>
        @enderror

        <input type="submit">
    </form>
</ul>
