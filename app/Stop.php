<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Oder');
    }
}
