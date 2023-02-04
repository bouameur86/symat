<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;

use App\Imports;
use App\Constructeur;
use Illuminate\Support\Facades\Validator;
use App\Comptage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\ComptagesExport;
use App\Imports\ComptagesImport;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class ComptageController extends Controller
{
    
    public function index(Request $request)
    {
        $postes = Poste::all();

        $comptages = Comptage::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');


        })->latest()->paginate(7);

        return view('dashboard.comptages.index', compact( 'postes', 'comptages'));

    }//end of index



    public function upload()
    {
        return view('dashboard.comptages.upload');
    }



    public function create()
    { 
        $postes = Poste::all();
        $comptages = Comptage::all();
        return view('dashboard.comptages.create' , compact('postes', 'comptages'));
    }//end of create

    public function store(Request $request)
    {

      $this->validate($request, [
            'poste' => 'required',
            'name' => 'required',
            'nivU' => 'required',
            'etat'=> 'required',
      ]);
      $comptage= new Comptage; 
      $comptage->poste_id = $request->poste;
      $comptage->name = $request->name;
      $comptage->nivU = $request->nivU;
      $comptage->etat = $request->etat;
      $comptage->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.comptages.index' , $comptage);

    }//end of store

        
    public function edit(Comptage $comptage)
    {
        
        $postes = Poste::all();
        return view('dashboard.comptages.edit', compact('postes','comptage'));

    }//end of edit

    public function update(Request $request, Comptage $comptage)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $comptage->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.comptages.index');
  
    }//end of update

    public function destroy(Comptage $comptage)
    {
        $comptage->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.comptages.index');

    }//end of destroy

    //** 
    public function export() 
   {
     return Excel::download(new ComptagesExport, 'comptages liste.xlsx');
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
        Excel::queueImport(new ComptagesImport(), $file);
        return redirect()->route('dashboard.comptages.index');
  
    }

}//end of controller
