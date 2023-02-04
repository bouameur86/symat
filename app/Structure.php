<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $guarded = [];

    protected $casts = [   ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function regions()
    {
        return $this->belongsTo(Region::class);

    }

}//end of model
