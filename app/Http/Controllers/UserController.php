<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function list()
    {
        $users = User::all();

        view('user/list', [
            'users' => $users,
        ]);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function show()
    {

    }

}
