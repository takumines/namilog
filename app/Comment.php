<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'diary_id', 'body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diary()
    {
        return $this->belongsTo('App\Diary');
    }

    /**
     * @return mixed
     */
    public function getCommentUserName()
    {
        return $this->user->name;
    }

    /**
     * 整形した日付
     */
    public function getFormattedCreatedAtAttribute()
    {
        $created_at = $this->created_at;
        return  date('Y年n月j日', strtotime($created_at));
    }
}
