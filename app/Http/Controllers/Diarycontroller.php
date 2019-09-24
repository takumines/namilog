<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DiaryController extends Controller
{
    public function list()
    {
        $diaries = Diary::all();
        $users = User::all();
        
        return view('diary/list', [
            'diaries' => $diaries,
            'users'   => $users,
            ]);
    }

    public function show(int $id)
    {
        $diary = Diary::find($id);
        $current_user = Auth::user();

        return view('diary/show', [
            'id' => $diary->id,
            'diary' => $diary,
            'current_user' => $current_user,
        ]);
    }

    public function add()
    {
        $spots = Spot::all();


        return view('diary.create', [
            'spots' => $spots,
        ]);
    }

    public function create(DiaryRequest $request)
    {
        $diary = new Diary();
        $user = Auth::user();
        $diary->user_id = $user->id;
        $form = $request->all();
        
        if(isset($form['image'])){
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(320, 240)->encode($extension); 
            // s3のuploadsファイルに追加 
            $path = Storage::disk('s3')->put('/diary/'.$filename,(string)$resize_img, 'public'); 
            // 画像のURLを参照 
            $url = Storage::disk('s3')->url('diary/'.$filename); 
        
        $diary->image_path = $url;
        } else {
            $diary->image_path = null;
        }

        unset($form['_token'],$form['image']);

        $diary->fill($form)->save();

        return redirect()->route('diary.show', [
            'id' => $diary->id,
        ]);
    }

    public function edit(int $id, Diary $diary, Spot $spots)
    {
        $diary = Diary::find($id);
        $spots = Spot::all();
        return view('diary/edit', [
            'diary' => $diary,
            'spots'  => $spots,
        ]);
    }

    public function update(DiaryRequest $request) 
    {
        $diary = Diary::find($request->id);
        $form = $request->all();
        
        if(isset($form['image'])){
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(320, 240)->encode($extension); 
            // s3のuploadsファイルに追加 
            $path = Storage::disk('s3')->put('/diary/'.$filename,(string)$resize_img, 'public'); 
            // 画像のURLを参照 
            $url = Storage::disk('s3')->url('diary/'.$filename); 
        
            $diary->image_path = $url;
            unset($form['image']);

        }

        if(isset($form['remove'])){
            $diary->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token']);

        $diary->fill($form)->save();

        return redirect()->route('diary.show', [
            'id' => $diary->id,
        ]);
    }
}
