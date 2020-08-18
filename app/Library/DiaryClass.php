<?php

namespace App\Library;

use App\Diary;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiaryRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DiaryClass
{
    public static function createDiary(DiaryRequest $request, Diary $diary)
    {
        $userId = Auth::id();
        $diary->user_id = $userId;
        $form = $request->all();

        if (isset($form['image'])) {
            // 画像の拡張子を取得
            $extension = $form['image']->getClientOriginalExtension();
            // 画像の名前を取得
            $filename = $form['image']->getClientOriginalName();
            // 画像をリサイズ
            $resize_img = Image::make($form['image'])->resize(320, 240)->encode($extension);
            // s3のuploadsファイルに追加
            $path = Storage::disk('s3')->put('/diary/' . $filename, (string)$resize_img, 'public');
            // 画像のURLを参照
            $url = Storage::disk('s3')->url('diary/' . $filename);

            $diary->image_path = $url;
        }

        if (isset($from['image'])) {
            $diary->image_path = null;
        }

        unset($form['_token'], $form['image']);

        $diary->fill($form)->save();
    }


    public static function updateDiary(DiaryRequest $request, Diary $diary)
    {
        $form = $request->all();

        if (isset($form['image'])) {
            // 画像の拡張子を取得
            $extension = $form['image']->getClientOriginalExtension();
            // 画像の名前を取得
            $filename = $form['image']->getClientOriginalName();
            // 画像をリサイズ
            $resize_img = Image::make($form['image'])->resize(320, 240)->encode($extension);
            // s3のuploadsファイルに追加
            $path = Storage::disk('s3')->put('/diary/' . $filename, (string)$resize_img, 'public');
            // 画像のURLを取得
            $url = Storage::disk('s3')->url('diary/' . $filename);

            $diary->image_path = $url;
        }

        if (isset($form['remove'])) {
            $diary->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token'], $form['image']);

        $diary->fill($form)->save();
    }

  //User

    public static function userUpdateImage(UserRequest $request)
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
            $path = Storage::disk('s3')->put('/user/' . $filename, (string)$resize_img, 'public');
            // 画像のURLを参照
            $url = Storage::disk('s3')->url('user/' . $filename);
            $user->image_path = $url;
        }

        if (isset($form['remove'])) {
            $user->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token'], $form['image']);

        $user->fill($form)->save();

        return $user;
    }
}
