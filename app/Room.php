<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }

}
