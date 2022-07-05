<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Http\Requests\Admin\UpdateCarForm;
use App\Mark;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::query()->orderBy("id","DESC")->paginate(3);
        for ($i = 0; $i < count($cars); $i++)
        {
            $mark_id = $cars[$i]->mark_id;
            $user_id = $cars[$i]->user_id;
            $mark = Mark::query()->where('id', '=',$mark_id)->get();

            if ($mark->isEmpty()) {
                $cars[$i]->mark_id = 0;
            }
            else
                $cars[$i]->mark_id = $mark[0]->name;

            $user = User::query()->where('id', '=',$user_id)->get();
            if ($user->isEmpty())
                $cars[$i]->user_id = "не знайдено";
            else
                $cars[$i]->user_id = $user[0]->name;
        }

        return view('admin.cars.cars', [
            'cars' => $cars
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::query()->get();
        $users = User::query()->get();
        return view('admin.cars.car_create', [
            'marks'=>$marks,
            'users'=>$users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCarForm $request)
    {
        $date = $request->validated();
        if ($request->has('image'))
        {
            $image = str_replace('public/cars/',"", $request->file('image')->store('public/cars'));
            $date['image'] = $image;
        }
        Car::create($date);
        return redirect(route('admin.cars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $mark_id = $car->mark_id;
        $user_id = $car->user_id;
        $mark = Mark::query()->where('id', '=',$mark_id)->get();

        if ($mark->isEmpty()) {
            $car->mark_id = 0;
        }
        else
            $car->mark_id = $mark[0]->name;

        $user = User::query()->where('id', '=',$user_id)->get();
        if ($user->isEmpty())
            $car->user_id = "не знайдено";
        else
            $car->user_id = $user[0]->name;
        $marks = Mark::query()->get();
        $users = User::query()->get();
        return view('admin.cars.car_update', [
            'car' => $car,
            'marks'=>$marks,
            'users'=>$users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarForm $request, $id)
    {
        $car = Car::findOrFail($id);

        $date = $request->validated();
        if ($request->has('image'))
        {
            $image = str_replace('public/cars/',"", $request->file('image')->store('public/cars'));
            $date['image'] = $image;
        }
        $car->update($date);
        return redirect(route('admin.cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);

        return redirect(route('admin.cars.index'));
    }


}
