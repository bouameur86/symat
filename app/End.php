<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class End extends Model
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

    
    public function protection()
    {
        return $this->belongsTo(Protection::class);

        }//end of commune

}//end of model
