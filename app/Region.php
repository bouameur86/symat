<?php

namespace App;
use App\Poste;
use App\Structure;
use App\Ste;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [  ];
    protected $casts = [   ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function poste()
    {
        return $this->hasMany(Poste::class);

    }//end of orders

    public function structure()
    {
        return $this->hasMany(Structure::class);

    }
    
    public function ste()
    {
        return $this->hasMany(Ste::class);

    }

    public function cms()
    {
        return $this->hasMany(Cm::class);

    }

}//end of model
