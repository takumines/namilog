<?php

namespace App\Http\Controllers;

use App\User;
use App\Spot;
use App\Diary;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Library\DiaryClass;

class UserController extends Controller
{
    public function list(User $user)
    {
        $users = $user->simplePaginate(7);

        return view('user.list', [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        DiaryClass::userUpdateImage($request, $user);

        return redirect()->route('user.show', [
            'user' => $user,
        ]);
    }

    public function show(Spot $spot, User $user, Diary $diary)
    {
        $current_user = Auth::user();
        $spots = $spot->all();
        $diaries = $diary->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->simplePaginate(3);


        return view('user.show', [
            'user' => $user,
            'current_user' => $current_user,
            'spots' => $spots,
            'diaries' => $diaries,
        ]);
    }
}
