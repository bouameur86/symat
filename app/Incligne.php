<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Incligne extends Model
{
  
    protected $guarded = [];
    protected $casts = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    


    public function ligne()
    {
        return $this->belongsTo(Ligne::class);

    }//end of commune

    public function protection()
    {
        return $this->hasMany(Ligne::class);

    }//end of commune
}//end of model
