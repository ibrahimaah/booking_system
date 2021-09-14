<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
