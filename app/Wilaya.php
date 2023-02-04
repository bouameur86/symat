<?php

namespace App;
use App\Commune;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Wilaya extends Model
{
    protected $guarded = [];

    protected $casts = [   ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute

    public function communes()
    {
        return $this->belongsTo(Commune::class);

    }//end of communes

    public function usres()
    {
        return $this->hasMany(User::class);

    }//end of users

    public function regions()
    {
        return $this->hasMany(Region::class);

    }//end of regions

  


}//end of model
