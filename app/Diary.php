<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

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
     * このdiaryを保有するspotを取得
     */
    public function spot()
    {
        return $this->belongsTo('App\Spot');
    }

    public function getSpotName()
    {
        return $this->spot->name;
    }

    protected $fillable = ['title', 'condition', 'size', 'score', 'body', 'image_path'];
}
