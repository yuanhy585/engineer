<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function shop_level()
    {
        return $this->belongsTo('App\ShopLevel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
