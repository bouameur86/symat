<?php

namespace App;

use App\Constructeur;
use App\Poste;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transfo extends Model
{
  
    protected $guarded = [];
    protected $casts = [  ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    

    public function poste()
    {
        return $this->belongsTo(Poste::class);

    }//end of commune


    public function constructeur()
    {
        return $this->belongsTo(Constructeur::class);

    }//end of commune


}//end of model
