<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>mark_id</th>
        <th>user_id</th>
        <th>year</th>
        <th>probig</th>
        <th>description</th>
    </tr>
    @foreach($cars as $car)
        <tr>
            <td><a href="{{  route("car_show", $car->id)  }}">{{$car->id}}</a> </td>
            <td>{{$car->name}}</td>
            <td>{{$car->mark_id}}</td>
            <td>{{$car->user_id}}</td>
            <td>{{$car->year}}</td>
            <td>{{$car->probig}}</td>
            <td>{{$car->description}}</td>
        </tr>
    @endforeach
</table>
