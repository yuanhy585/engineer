<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function shops()
    {
        return $this->hasMany('App\Shop');

    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
