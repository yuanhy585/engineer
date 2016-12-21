<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function region()
    {
        return $this->hasOne('App\Region');
    }

    public function province()
    {
        return $this->hasOne('App\Province');
    }

    public function city()
    {
        return $this->hasOne('App\City');
    }

    public function channel()
    {
        return $this->hasOne('App\Channel');
    }

    public function shoplevel()
    {
        return $this->hasOne('App\ShopLevel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
