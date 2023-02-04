<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indlig extends Model
{
    protected $guarded = [];

    protected $casts = [
        'phone' => 'array'
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute

    public function regions()
    {
        return $this->hasMany(Region::class);

    }//end of orders
    public function transfos()
    {
        return $this->hasMany(Transfo::class);

    }//end 

}//end of model
