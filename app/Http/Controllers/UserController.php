<?php

namespace App\Http\Controllers;

use App\User;
use App\Spot;
use App\Diary;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(User $user)
    {
        $users = $user->simplePaginate(7);

        return view('user.list', [
            'users' => $users,
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->userUpdateImage($request);

        return redirect()->route('user.show', [
            'user' => $user,
        ]);
    }

    /**
     * @param Spot $spot
     * @param User $user
     * @param Diary $diary
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
