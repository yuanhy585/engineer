<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
}
