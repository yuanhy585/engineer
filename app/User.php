<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
