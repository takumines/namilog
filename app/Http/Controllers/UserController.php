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
    public function list()
    {
        $users = User::simplePaginate(7);

        return view('user/list', [
            'users' => $users,
        ]);
    }

    public function edit(int $id)
    {
        $user = User::find($id);
        
        return view('user.edit', [
            'user' => $user,
            'id' => $user->id,
        ]);
    }

    public function update(UserRequest $request)
    {
        $user = DiaryClass::userUpdateImage($request);

        return redirect()->route('user.show', [
            'id' => $user->id,
        ]);
    }

    public function show(int $id, Spot $spots, User $user, Diary $diaries)
    {
        $user = User::find($id);
        $current_user = Auth::user();
        $spots = Spot::all();
        $diaries = Diary::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->simplePaginate(3);


        return view('user/show', [
            'user' => $user,
            'current_user' => $current_user,
            'spots' => $spots,
            'diaries' => $diaries,
        ]);
    }
}
