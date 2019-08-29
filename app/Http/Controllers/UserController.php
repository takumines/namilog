<?php

namespace App\Http\Controllers;

use App\User;
use App\Spot;
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

        if(isset($form['image'])){
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(400, 300)->encode($extension); 
            // s3のuploadsファイルに追加 
            $path = Storage::disk('s3')->put('/user/'.$filename,(string)$resize_img, 'public'); 
            // 画像のURLを参照 
            $url = Storage::disk('s3')->url('diary/'.$filename); 
        
            $user->image_path = $url;
        } else {
            $user->image_path = null;
        }

        unset($form['_token'],$form['image']);

        $user->fill($form)->save();

        return redirect()->route('user.show', [
            'id' => $user->id,
        ]);
    }

    public function show(int $id)
    {
        $user = User::find($id);
        $current_user = Auth::user();
        $spots = Auth::user()->spots()->get();

        return view('user/show', [
            'user' => $user,
            'id' => $user->id,
            'current_user' => $current_user,
            'spots' => $spots,
        ]);
    }

}
