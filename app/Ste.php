<?php

namespace App;
use App\Commune;
use App\Region;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Ste extends Model
{
    protected $guarded = [];

    protected $casts = [   ];
    protected $table = "stes";

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute

    public function commune()
    {
        return $this->belongsTo(Commune::class);

    }//end of users

    public function poste()
    {
        return $this->hasMany(Poste::class);

    }//end of users

    public function usres()
    {
        return $this->hasMany(User::class);

    }//end of users

    public function region()
    {
        return $this->belongsTo(Region::class);

    }//end of users

}//end of model
