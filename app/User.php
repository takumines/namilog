<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'stance', 'board', 'introduction', 'image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function spots()
    {
        return $this->hasMany('App\Spot');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * config/stance.phpの数字を文字に変換
     */

    public function getStanceLabelAttribute()
    {
        $stance_name = $this->attributes['stance'];

        return config('stance')[$stance_name]['label'];
    }

    /**
     * config/board.phpの数字を文字に変換
    */

    public function getBoardLabelAttribute()
    {
        $board_name = $this->attributes['board'];

        return config('board')[$board_name]['label'];
    }

    public function getSpotName()
    {
        return $this->spots->name;
    }
}
