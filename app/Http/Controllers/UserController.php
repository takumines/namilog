<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();

        return view('user/list', [
            'users' => $users,
        ]);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function show(int $id)
    {
        $user = User::find($id);

        return view('user/show', [
            'user' => $user,
            'id' => $user->id,
        ]);
    }

}
