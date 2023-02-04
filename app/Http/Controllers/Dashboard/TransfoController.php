<?php

namespace App\Http\Controllers\Dashboard;

use App\Poste;
use App\Constructeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PosteExport;
use App\Exports\TransfosExport;
use App\Imports\PostesImport;
use App\Imports\TransfosImport;
use App\Transfo;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class TransfoController extends Controller
{
    public function index(Request $request)
    {

        $postes = Poste::all();
        $transfos = Transfo::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');


        })->latest()->paginate(9900);

        return view('dashboard.transfos.index', compact( 'postes','transfos'));

    }//end of index

    public function upload()
    {
        return view('dashboard.transfos.upload');
    }

    public function create()
    { 
        $postes = Poste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.transfos.create' , compact( 'constructeurs','postes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'poste' => 'required',
            'name' => 'required',
            'nivU' => 'required',
            'puissance' => 'required',
            'numgrte' => 'required|unique:transfos',
            'constructeur'=> 'required',
            'datemise'=> 'required',
            'etat'=> 'required',
      ]);
      $transfo= new Transfo; 
      $transfo->poste_id = $request->poste;
      $transfo->name = $request->name;
      $transfo->nivU = $request->nivU;
      $transfo->puissance = $request->puissance;
      $transfo->numgrte = $request->numgrte;
      $transfo->constructeur_id = $request->constructeur; 
      $transfo->datemise = $request->datemise;
      $transfo->etat = $request->etat;

      $transfo->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.transfos.index' , $transfo);

    }//end of store


    public function edit(Transfo $transfo)
    {

        $postes = Poste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.transfos.edit', compact('postes' ,'constructeurs','transfo'));

    }//end of edit

    public function update(Request $request, Transfo $transfo)
    {
        $rules = [ ' '];
        $request->validate($rules);
    
        $transfo->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.transfos.index');
  
    }//end of update

    public function destroy(Transfo $transfo)
    {
        $transfo->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.transfos.index');

   }//end of destroy


   public function export() 
   {
      return Excel::download(new TransfosExport, 'Transfos liste.xlsx');

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
        Excel::queueImport(new TransfosImport(), $file);
        return redirect()->route('dashboard.transfos.index');
     

    }

}//end of controller
