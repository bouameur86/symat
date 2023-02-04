<?php

namespace App;
use App\Constructeur;
use App\Poste;
use App\Depart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Compteur extends Model
{
  
    protected $guarded = [];
    protected $casts = [  ];
    protected $table = "compteurs";
  
  /*  protected $fillable = ['poste_id','name', 'code', 'region_id', 'nivU','ste','clientxd','constructeur', 'datemise'];

   public static function getComptage()
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

    public function depart()
    {
        return $this->belongsTo(Depart::class);

    }//end of commune

    
}//end of model
