<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;

use App\Imports;
use App\Depart;
use Illuminate\Support\Facades\Validator;
use App\Compteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\CompteursExport;
use App\Imports\CompteursImport;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class CompteurController extends Controller
{
    
    public function index(Request $request)
    {
        $postes = Poste::all();
        $departs = Depart::all();
        $compteurs = Compteur::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');

        })->when($request->depart_id, function ($q) use ($request) {

            return $q->orWhere('depart', 'like', '%'. $request->depart. '%');
        })->latest()->paginate(7);

        return view('dashboard.compteurs.index', compact( 'postes', 'departs','compteurs'));

    }//end of index


    public function upload()
    {
        return view('dashboard.compteurs.upload');
    }

    public function getdeparts($id)                    
    {
      //  $names = DB::table("departs")->where("poste_id", $id)->pluck('name' , 'id');
     //   $nivus = DB::table("departs")->where("poste_id", $id)->pluck('nivU' , 'id');
          $departs = DB::table('departs')->where("poste_id", $id)->pluck('name' , 'id');
     //   $departs = [($names).($nivus)];

        return json_encode($departs);
    }

 
    public function create()
    { 
        $postes = Poste::all();
        $departs = Depart::all();
        $compteurs = Compteur::all();
        
        return view('dashboard.compteurs.create' , compact('postes','departs' ,'compteurs'));
    }//end of create

    public function store(Request $request)
    {

      $this->validate($request, [
            'poste' => 'required',
            'depart' => 'required',
            'comp_num' => 'required',
            'comp_constr' => 'required',
            'etat'=> 'required',
            'datemise'=> 'required',
      ]);
      $compteur= new Compteur; 
      $compteur->poste_id = $request->poste;
      $compteur->depart = $request->depart;
      $compteur->comp_num = $request->comp_num;
      $compteur->comp_constr = $request->comp_constr;
      $compteur->etat = $request->etat;
      $compteur->datemise = $request->datemise; 
      $compteur->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.compteurs.index' , $compteur);

    }//end of store

        
    public function edit(Compteur $compteur)
    {
        
        $postes = Poste::all();
        $departs = Depart::all();
        return view('dashboard.compteurs.edit', compact('postes','departs','compteur'));

    }//end of edit

    public function update(Request $request, Compteur $compteur)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $compteur->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.compteurs.index');
  
    }//end of update

    public function destroy(Compteur $compteur)
    {
        $compteur->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.compteurs.index');

    }//end of destroy

    //** 
    public function export() 
   {
     return Excel::download(new CompteursExport, 'compteurs liste.xlsx');
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
          'attachment' => 'required|mimes:xlsx,xls',
        ]);
        if ($validation->fails()) {
        return redirect()->back()->withErrors($validation)->withInput();
        }

      $file = $request->file('attachment');
        Excel::queueImport(new CompteursImport(), $file);
        return redirect()->route('dashboard.compteurs.index');
  
    }


}//end of controller
