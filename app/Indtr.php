<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indtr extends Model
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
        return $this->belongsTo(Region::class);

    }//end of orders


}//end of model
