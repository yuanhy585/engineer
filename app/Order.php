<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function stop()
    {
        return $this->belongsTo('App\Stop');
    }

    public function materialOrder()
    {
        return $this->hasMany('App\MaterialOrder');
    }

}
