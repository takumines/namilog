<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
protected $fillable = ['name', 'place', 'body', /* 'user_id' */];

    public function diary()
    {
        return $this->hasMany('App\Diary');
    }
}
