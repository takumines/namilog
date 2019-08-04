<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiary;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Diarycontroller extends Controller
{
    public function index()
    {
        $diaries = Diary::all();
        
        return view('diary/index', [
            'diaries' => $diaries,
            ]);
    }

    public function show(int $id)
    {
        $diary = Diary::find($id);

        return view('diary/show', [
            'id' => $diary->id,
            'diary' => $diary,
        ]);
    }

    public function add()
    {
        $spots = Spot::all();


        return view('diary.create', [
            'spots' => $spots,
        ]);
    }

    public function create(CreateDiary $request)
    {
        $diary = new Diary();
        $form = $request->all();
        
        if(isset($form['image'])){
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(400, 300)->encode($extension); 
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

    public function edit(int $id, Diary $diary)
    {
        $diary = Diary::find($id);

        return view('diary/edit', [
            'diary' => $diary,
        ]);
    }

    public function update(Request $request) 
    {
        $diary = Diary::find($request->id);
        $form = $request->all();
        
        if(isset($form['image'])){
            // 画像の拡張子を取得 
            $extension = $form['image']->getClientOriginalExtension(); 
            // 画像の名前を取得 
            $filename = $form['image']->getClientOriginalName(); 
            // 画像をリサイズ 
            $resize_img = Image::make($form['image'])->resize(400, 300)->encode($extension); 
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
}
