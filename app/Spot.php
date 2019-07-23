<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    public function diary()
    {
        return $this->hasMany('App\Diary');
    }
}
