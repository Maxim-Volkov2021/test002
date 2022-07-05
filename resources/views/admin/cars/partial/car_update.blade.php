<ul>
    <form action="{{route("admin.cars.update", $car->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <li>id: {{$car->id}}</li>

        <li>name: <input name="name" type="text" value="{{$car->name}}"></li>
        @error('name')
            <p>{{$message}}</p>
        @enderror

        <li>mark:
            <select name="mark_id">
                @foreach($marks as $mark)
                    @if($mark->name == $car->mark_id)
                        <option selected value="{{$mark->id}}">{{$mark->name}}</option>
                    @else
                        <option value="{{$mark->id}}">{{$mark->name}}</option>
                    @endif
                @endforeach
            </select></li>
        @error('mark_id')
        <p>{{$message}}</p>
        @enderror

        <li>user_id:
            <select name="user_id">
                @foreach($users as $user)
                    @if($user->name == $car->user_id)
                        <option selected value="{{$user->id}}">{{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select></li>
        @error('user_id')
            <p>{{$message}}</p>
        @enderror

        <li>year: <input name="year" type="number" value="{{$car->year}}"></li>
        @error('year')
            <p>{{$message}}</p>
        @enderror

        <li>probig: <input name="probig" type="number" value="{{$car->probig}}"></li>
        @error('probig')
            <p>{{$message}}</p>
        @enderror

        <li>description: <textarea name="description" rows="5" cols="50">{{$car->description}}</textarea></li>
        @error('description')
            <p>{{$message}}</p>
        @enderror

        @if($car->image)
            <div>
                <img src="/storage/cars/{{$car->image}}">
            </div>
        @endif
        <li>image: <input name="image" type="file"></li>
        @error('image')
            <p>{{$message}}</p>
        @enderror

        <input type="submit">
    </form>
</ul>
