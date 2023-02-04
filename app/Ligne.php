<?php

namespace App;
use App\Region;
use App\Constructeur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ligne extends Model
{
  
    protected $guarded = [];
    protected $casts = [  ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    

    public function region()
    {
        return $this->belongsTo(Region::class);

    }//end of region

    public function ste()
    {
        return $this->belongsTo(Ste::class);

    }//end of region
    public function constructeur()
    {
        return $this->belongsTo(Constructeur::class);
    }

    }//end of constructeur