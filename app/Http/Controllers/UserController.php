<?php

namespace App\Http\Controllers;

use App\User;
use App\Spot;
use App\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();

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
        $user = User::find($request->id);
        $form = $request->all();
        if (isset($form['image'])) {
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(300, 300)->encode($extension); 
            // s3のuploadsファイルに追加 
            $path = Storage::disk('s3')->put('/user/'.$filename,(string)$resize_img, 'public'); 
            // 画像のURLを参照 
            $url = Storage::disk('s3')->url('user/'.$filename); 
            $user->image_path = $url;
            unset($form['image']);
        }

        if(isset($form['remove'])){
            $user->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token']);

        $user->fill($form)->save();

        return redirect()->route('user.show', [
            'id' => $user->id,
        ]);
    }

    public function show(int $id, Spot $spots, User $user, Diary $diaries)
    {
        $user = User::find($id);
        $current_user = Auth::user();
        $spots = Spot::all();
        $diaries = Diary::all();


        return view('user/show', [
            'user' => $user,
            'current_user' => $current_user,
            'id' => $user->id,
            'spots' => $spots,
            'diaries' => $diaries,
        ]);
    }

}
