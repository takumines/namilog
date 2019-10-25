<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Diary extends Model
{
    protected $fillable = ['title', 'user_id', 'spot_id', 'condition', 'size', 'score', 'body', 'image_path'];
    
        public function comments()
        {
            return $this->hasMany('App\Comment');
        }

        public function spot()
        {
            return $this->belongsTo('App\Spot');
        }

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

}
