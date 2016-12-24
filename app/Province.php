<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function shops()
    {
        return $this->hasMany('App\Province');

    }
}
