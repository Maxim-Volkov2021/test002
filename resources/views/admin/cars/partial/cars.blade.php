<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>mark_id</th>
        <th>user_id</th>
        <th>year</th>
        <th>probig</th>
        <th>options</th>
    </tr>
    @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>{{$car->mark_id}}</td>
            <td>{{$car->user_id}}</td>
            <td>{{$car->year}}</td>
            <td>{{$car->probig}}</td>
            <td>
                <a href="{{route('admin.cars.edit', $car->id)}}">Редагувати</a>
                <form action="{{route('admin.cars.destroy', $car->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" >Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
