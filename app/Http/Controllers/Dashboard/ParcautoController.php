<?php

namespace App\Http\Controllers\Dashboard;

use App\Poste;
use App\Constructeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PosteExport;
use App\Exports\ParcautosExport;
use App\Imports\PostesImport;
use App\Imports\ParcautosImport;
use App\Parcauto;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class ParcautoController extends Controller
{
    public function index(Request $request)
    {

        $postes = Poste::all();
        $parcautos = Parcauto::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');


        })->latest()->paginate(9900);

        return view('dashboard.parcautos.index', compact( 'postes','parcautos'));

    }//end of index

    public function upload()
    {
        return view('dashboard.parcautos.upload');
    }

    public function create()
    { 
        $postes = Poste::all();
        return view('dashboard.parcautos.create' , compact('postes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'poste' => 'required',
            'fabriq' => 'required',
            'finis' => 'required',
            'immatri' => 'required|unique:parcautos',
            'carbu' => 'required',
            'propri' => 'required',
            'datemise'=> 'required',
            'etat'=> 'required',
      ]);
      $parcauto= new Parcauto; 
      $parcauto->poste_id = $request->poste;
      $parcauto->fabriq = $request->fabriq;
      $parcauto->finis = $request->finis;
      $parcauto->immatri = $request->immatri;
      $parcauto->carbu = $request->carbu;
      $parcauto->propri = $request->propri;
      $parcauto->datemise = $request->datemise;
      $parcauto->etat = $request->etat;

      $parcauto->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.parcautos.index' , $parcauto);

    }//end of store


    public function edit(Parcauto $parcauto)
    {

        $postes = Poste::all();
        return view('dashboard.parcautos.edit', compact('postes','parcauto'));

    }//end of edit

    public function update(Request $request, Parcauto $parcauto)
    {
        $rules = [ ' '];
        $request->validate($rules);
    
        $parcauto->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.parcautos.index');
  
    }//end of update

    public function destroy(Parcauto $parcauto)
    {
        $parcauto->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.parcautos.index');

   }//end of destroy


   public function export() 
   {
      return Excel::download(new ParcautosExport, 'Parcautos liste.xlsx');

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
        Excel::queueImport(new ParcautosImport(), $file);
        return redirect()->route('dashboard.parcautos.index');
     

    }

}//end of controller
