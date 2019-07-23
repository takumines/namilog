<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
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
}
