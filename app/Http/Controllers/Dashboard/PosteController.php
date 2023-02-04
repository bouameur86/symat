<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;
use App\Imports;
use App\Constructeur;
use Illuminate\Support\Facades\Validator;
use App\Poste;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PosteExport;
use App\Imports\PostesImport;
use App\Region;
use App\Ste;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class PosteController extends Controller
{
    
    public function index(Request $request)
    {
        $regions = Region::all();
        $communes = Commune::all();

        $postes = Poste::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->commune_id, function ($q) use ($request) {

            return $q->orWhere('commune_id', 'like', '%'. $request->commune_id . '%');
        
        })->when($request->region_id, function ($q) use ($request) {

            return $q->orWhere('region_id', 'like', '%'. $request->region_id . '%');


        })->latest()->paginate(99999);

        return view('dashboard.postes.index', compact( 'regions', 'postes','communes'));

    }//end of index



    public function upload()
    {
        return view('dashboard.postes.upload');
    }



    public function create()
    { 
        $regions = Region::all();
        $stes = Ste::all();
        $constructeurs = Constructeur::all();
        $communes = Commune::all();
        return view('dashboard.postes.create' , compact('communes', 'constructeurs','regions','stes'));
    }//end of create

    public function store(Request $request)
    {

      $this->validate($request, [
            'region' => 'required',
            'name' => 'required',
            'code' => 'required',
            'nivU' => 'required',
            'ste' => 'required',
            'clientxd' => 'required',
            'constructeur'=> 'required',
            'commune'=> 'required',
            'datemise'=> 'required',
      ]);
      $poste= new Poste; 
      $poste->region_id = $request->region;
      $poste->name = $request->name;
      $poste->code = $request->code;
      $poste->nivU = $request->nivU;
      $poste->ste_id = $request->ste; 
      $poste->clientxd = $request->clientxd; 
      $poste->constructeur_id = $request->constructeur; 
      $poste->commune_id = $request->commune; 
      $poste->datemise = $request->datemise;
      $poste->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.postes.index' , $poste);

    }//end of store

        
    public function edit(Poste $poste)
    {
        
        $regions = Region::all();
        $stes = Ste::all();
        $communes = Commune::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.postes.edit', compact('communes','regions' ,'constructeurs','stes','poste'));

    }//end of edit

    public function update(Request $request, Poste $poste)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $poste->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.postes.index');
  
    }//end of update

    public function destroy(Poste $poste)
    {
        $poste->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.postes.index');

    }//end of destroy

    public function export() 
   {
      return Excel::download(new PosteExport, 'postes liste.xlsx');

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
        Excel::queueImport(new PostesImport(), $file);
        return redirect()->route('dashboard.postes.index');
     

    }


}//end of controller
