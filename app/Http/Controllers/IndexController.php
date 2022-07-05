<?php

namespace App\Http\Controllers;

use App\Car;
use App\Mark;
use App\User;
/*use http\Client\Curl\User;*/
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $cars = Car::query()->orderBy("id","DESC")->limit(3)->get();
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


        return view('welcome', [
            'cars' => $cars
        ]);
    }
}
