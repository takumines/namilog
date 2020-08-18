<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiaryRequest;
use App\Library\DiaryClass;

class DiaryController extends Controller
{
    /**
     * @param Diary $diary
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Diary $diary, User $user)
    {
        $diaries = $diary->orderBy('created_at','desc')->simplePaginate(6);
        $users = $user->all();
        
        return view('diary/list', [
            'diaries' => $diaries,
            'users'   => $users,
            ]);
    }

    /**
     * @param Diary $diary
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Diary $diary)
    {
        $current_user = Auth::user();
        $comments = Comment::where('diary_id', '=', $diary->id)->orderBy('created_at','desc')->simplePaginate(5);

        return view('diary/show', [
            'diary' => $diary,
            'comments' => $comments,
            'current_user' => $current_user,
        ]);
    }

    /**
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Spot $spot)
    {
        $user = Auth::user();
        $spots = $spot->all();
        
        return view('diary.create', [
            'user' => $user,
            'spots' => $spots,
        ]);
    }

    /**
     * @param DiaryRequest $request
     * @param Diary $diary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DiaryRequest $request, Diary $diary)
    {
        DiaryClass::createDiary($request,$diary);

        return redirect()->route('diary.show', [
            'diary' => $diary
        ]);
    }

    /**
     * @param Diary $diary
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Diary $diary, Spot $spot)
    {
        $spots = $spot->all();
        return view('diary/edit', [
            'diary' => $diary,
            'spots'  => $spots,
        ]);
    }

    /**
     * @param DiaryRequest $request
     * @param Diary $diary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DiaryRequest $request, Diary $diary)
    {
        DiaryClass::updateDiary($request, $diary);
        
        return redirect()->route('diary.show', [
            'diary' => $diary
        ]);
    }

    /**
     * @param Diary $diary
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Diary $diary, User $user)
    {
        Comment::where('diary_id', '=', $diary->id)->delete();
        $diary->delete();
        $diaries = $diary->all();
        $users = $user->all();

        return redirect()->route('diary.list', [
            'diaries' => $diaries,
            'users'   => $users,
        ]);
    }
}
