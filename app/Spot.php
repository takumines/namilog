<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['name', 'place', 'body'];

    public function diary()
    {
        return $this->hasMany('App\Diary');
    }
}
