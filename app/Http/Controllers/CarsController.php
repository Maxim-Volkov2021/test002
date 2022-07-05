<?php

namespace App\Http\Controllers;

use App\Car;
use App\Mark;
use App\User;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $number = 4;
        $cars = Car::query()->orderBy("id","DESC")->paginate($number);
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

        return view('cars.cars', [
            'cars' => $cars
        ]);
    }

    public function show($id)
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
        return view('cars.car', [
            'car' => $car
        ]);
    }
}
