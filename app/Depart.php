<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Depart extends Model
{
  
    protected $guarded = [];
    protected $casts = [  ];
    protected $table = "departs";
  
  /*  protected $fillable = ['poste_id','name', 'code', 'region_id', 'nivU','ste','clientxd','constructeur', 'datemise'];

   public static function getDepart()
    {
        $records = DB::table('postes')->select('id','name','code','region_id' ,'nivU','ste_id','clientxd', 'constructeur_id','datemise')->get()->toArray();
            return $records;
    }  
    */
    
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    


    public function poste()
    {
        return $this->belongsTo(Poste::class);

    }//end of commune

    public function compteur()
    {
        return $this->hasMany(Compteur::class);

    }//end of compteur


    public function transite()
    {
        return $this->hasMany(Transite::class);

    }//end of commune




}//end of model
