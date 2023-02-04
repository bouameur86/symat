<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anomalieexp extends Model
{
  
    protected $guarded = [];
    protected $casts = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    

    public function poste()
    {
        return $this->belongsTo(Poste::class);

        }//end of commune
    }