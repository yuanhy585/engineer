<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function MaterialOrder()
    {
        return $this->hasMany('App\MaterialOrder');
    }
}
