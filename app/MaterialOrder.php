<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialOrder extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
