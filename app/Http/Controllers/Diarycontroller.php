<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Spot;
use Illuminate\Http\Request;
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
        ]);
    }

    public function add()
    {
        return view('diary.create');
    }

    public function create(Request $request)
    {
        $diary = new Diary();
        $form =$request->all();
        // formから送信されたimgファイルを読み込む
        $file = $form['image'];

        // 画像の拡張子を取得 
        $extension = $file->getClientOriginalExtension(); 
        // 画像の名前を取得 
        $filename = $file->getClientOriginalName(); 
        // 画像をリサイズ 
        $resize_img = Image::make($file)->resize(400, 300)->encode($extension); 
        // s3のuploadsファイルに追加 
        $path = Storage::disk('s3')->put('/myprefix/'.$filename,(string)$resize_img, 'public'); 
        // 画像のURLを参照 
        $url = Storage::disk('s3')->url('myprefix/'.$filename); 
        
        $diary->image_path = $url;

        unset($form['_token'],$form['image']);

        $diary->fill($form)->save();

        return redirect()->route('diary.index');
    }
}
