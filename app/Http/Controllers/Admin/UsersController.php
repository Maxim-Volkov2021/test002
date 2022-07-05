<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserForm;
use App\Http\Requests\Admin\UserForm;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->orderBy('id','DESC')->paginate(5);
        return view("admin.users.index", [
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserForm $request)
    {
        $date = $request->validated();
        $date['password'] = bcrypt($date['password']);

        User::create($date);
        return redirect(route('admin.users.index'));
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
        $user = User::findOrFail($id);
        return view('admin.users.update',[
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserForm $request, $id)
    {
        $user = User::findOrFail($id);
        $date = [];
        if ($request->validated()['password'] != null)
        {
            $date = $request->validated();
            $date['password'] = bcrypt($date['password']);
        }
        else
        {
            $date = [
                'name' => $request->validated()['name'],
                'email'=>$request->validated()['email']
            ];
        }

        $user->update($date);

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('admin.users.index'));
    }
}
