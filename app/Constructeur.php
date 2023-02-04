<?php

namespace App;

use App\Poste;
use App\Transfo;

use Illuminate\Database\Eloquent\Model;

class Constructeur extends Model
{
    protected $guarded = [];

    protected $casts = [   ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute
    

    public function postes()
    {
        return $this->belongsToMany(Poste::class);

    }//end of orders

    public function Transfos()
    {
        return $this->belongsToMany(Transfo::class);

    }//end of orders


}//end of model
