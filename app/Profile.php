<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'user_id', 'stance', 'board', 'introduction', 'image_path'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
