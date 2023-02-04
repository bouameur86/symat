<?php

namespace App;

use App\Poste;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class parcauto extends Model
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

    }//poste of commune


}//end of model
