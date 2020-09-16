<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Diary extends Model
{
    protected $fillable = ['title', 'user_id', 'spot_id', 'condition', 'size', 'score', 'body', 'image_path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spot()
    {
        return $this->belongsTo('App\Spot');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * このdiaryを保有するuser名を取得
     */
    public function getUserName()
    {
        return $this->user->name;
    }
        
    /**
     * このdiaryを保有するspotを取得
     */
    public function getSpotName()
    {
        return $this->spot->name;
    }

    /**
     * config/condition.phpの数値を文字に変換
     */
    public function getConditionLabelAttribute()
    {
        $condition_name = $this->attributes['condition'];

        return config('condition')[$condition_name]['label'];
    }

    /**
     * config/size.phpの数値を文字に変換
     */
    public function getSizeLabelAttribute()
    {
        $size_name = $this->attributes['size'];

        return config('size')[$size_name]['label'];
    }

    /**
     * config/score.phpの数値を文字に変換
     */
    public function getScoreLabelAttribute()
    {
        $score_name = $this->attributes['score'];

        return config('score')[$score_name]['label'];
    }

    /**
     * 整形した日付
     */
    public function getFormattedCreatedAtAttribute()
    {
        $updated_at = $this->created_at;
        return  date('Y年n月j日', strtotime($updated_at));
    }

    /**
     * @param $request
     * @param $diary
     */
    public function createDiary($request, $diary)
    {
        $userId = Auth::id();
        $diary->user_id = $userId;
        $form = $request->all();

        $this->uploadImage($form, $diary);

        if (isset($from['image'])) {
            $diary->image_path = null;
        }

        unset($form['_token'], $form['image']);

        $diary->fill($form)->save();
    }

    /**
     * @param $request
     * @param $diary
     */
    public function updateDiary($request, $diary)
    {
        $form = $request->all();

        $this->uploadImage($form, $diary);

        if (isset($form['remove'])) {
            $diary->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token'], $form['image']);

        $diary->fill($form)->save();
    }

    /**
     * @param $form
     * @param $diary
     */
    private function uploadImage($form, $diary)
    {
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
    }
}
