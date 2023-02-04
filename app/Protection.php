<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Protection extends Model
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

    }//end of region

    public function constructeur()
    {
        return $this->belongsTo(Constructeur::class);

    }//end of constructeur


}//end of model
