<?php

namespace App;
use App\Wilaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Commune extends Model
{
    protected $guarded = [];

    protected $casts = [   ];
    protected $table = "communes";

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);

    }//end of users

    public function users()
    {
        return $this->hasMany(User::class);

    }//end of users

    public function regions()
    {
        return $this->belongsTo(Region::class);

    }//end of regions



}//end of model
