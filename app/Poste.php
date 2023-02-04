<?php

namespace App;
use App\Region;
use App\Commune;
use App\End;
use App\Ste;
use App\Constructeur;
use App\Transfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Poste extends Model
{
  
    protected $guarded = [];
    protected $casts = [  ];
    protected $table = "postes";
  
  /*  protected $fillable = ['poste_id','name', 'code', 'region_id', 'nivU','ste','clientxd','constructeur', 'datemise'];

   public static function getPoste()
    {
        $records = DB::table('postes')->select('id','name','code','region_id' ,'nivU','ste_id','clientxd', 'constructeur_id','datemise')->get()->toArray();
            return $records;
    }  
    */
    
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute    

    public function region()
    {
        return $this->belongsTo(Region::class);

    }//end of region

    public function anomalieexp()
    {
        return $this->hasMany(Anomalieexp::class);

    }//end of region

    public function commune()
    {
        return $this->belongsTo(Commune::class);

    }//end of commune

    public function ste()
    {
        return $this->belongsTo(Ste::class);

    }//end of commune

    public function constructeur()
    {
        return $this->belongsTo(Constructeur::class);

    }//end of constructeur

    public function Transfos()
    {
        return $this->hasMany(Transfo::class);

    }//end of orders

}//end of model
