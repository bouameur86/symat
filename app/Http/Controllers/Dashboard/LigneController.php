<?php

namespace App\Http\Controllers\Dashboard;

use App\Constructeur;
use App\Ligne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\ligneExport;
use App\Imports\lignesImport;
use App\Region;
use App\Ste;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class LigneController extends Controller
{
    
    public function index(Request $request)
    {
        $lignes = Ligne::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
            return $q->orWhere('code', 'like' ,'%' . $request->search . '%');

        })->latest()->paginate(8);

        return view('dashboard.lignes.index', compact('lignes'));


    }//end of index

    public function create()
    { 
        $regions = Region::all();
        $stes = Ste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.lignes.create' , compact('constructeurs','regions', 'stes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'region' => 'required',
            'ste' => 'required',
            'name' => 'required',
            'code' => 'required',
            'nivU' => 'required',
            'longeur' => 'required',
            'nbrpylone' => 'required',
            'section' => 'required',
            'constructeur'=> 'required',
            'datemise'=> 'required',
      ]);
      $ligne= new Ligne; 
      $ligne->region_id = $request->region;
      $ligne->ste_id = $request->ste;
      $ligne->name = $request->name;
      $ligne->code = $request->code;
      $ligne->nivU = $request->nivU;
      $ligne->longeur = $request->longeur; 
      $ligne->nbrpylone = $request->nbrpylone; 
      $ligne->section = $request->section; 
      $ligne->constructeur_id = $request->constructeur; 
      $ligne->datemise = $request->datemise;

      $ligne->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.lignes.index' , $ligne);

    }//end of store


    public function edit(Ligne $ligne)
    {
        
        $regions = Region::all();
        $stes = Ste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.lignes.edit', compact('regions', 'stes' ,'constructeurs','ligne'));

    }//end of edit

    public function show(Ligne $ligne)
    {
        $stes = Ste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.lignes.show' , compact('ligne' , 'stes', 'constructeurs' ));
  
    }//end of update
    public function update(Request $request, Ligne $ligne)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $ligne->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.lignes.index');
  
    }//end of update

    public function destroy(Ligne $ligne)
    {
        $ligne->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.lignes.index');

    }//end of destroy

   // public function export() 
  //  {

    //    return Excel::download(new ligneExport, 'lignes.xlsx');

    //}

   // public function import() 
   // {
     //   Excel::import(new lignesImport, 'users.xlsx');
       // return redirect()->route('dashboard.lignes.index')->with('success', 'All good!');
   // }



}//end of controller
