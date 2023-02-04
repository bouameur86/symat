<?php

namespace App\Http\Controllers\Dashboard;

use App\Incligne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\InclignesExport;
use App\Imports\InclignesImport;
use App\Ligne;
use App\Poste;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class IncligneController extends Controller
{
    
    public function index()
    {
   
        $inclignes = Incligne::all();
        
        return view('dashboard.inclignes.index', compact('inclignes'));

    }//end of index

    public function create()
    { 
        $lignes = Ligne::all();
        return view('dashboard.inclignes.create' , compact('lignes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
         
            'ligne' => 'required',
            'dateheured'=> 'required',
            'dateheuref' => 'required',
            'dure' => 'required',
            'cause' => 'required',
            'typeincA'=> 'nullable',
            'typeincB'=> 'nullable',            
            'protpostea'=> 'nullable',
            'protposteb'=> 'nullable',
            'phasesa'=> 'nullable',
            'phasesb'=> 'nullable',
            'imputation'=> 'required',
            'stadea'=> 'nullable',
            'stadeb'=> 'nullable',
            'ldefa'=> 'nullable',
            'ldefb'=> 'nullable',
            'observ' => 'nullable',
      ]);

      $incligne= new Incligne; 
          
      $incligne->ligne_id = $request->ligne;
      $incligne->dateheured = $request->numtr;
      $incligne->dateheuref = $request->nivU;
      $incligne->dure = $request->dure; 
      $incligne->cause = $request->cause;

      $incligne->typeinca = $request->typeinca; 
      $incligne->typeincb = $request->typeincb;
      $incligne->protpostea = $request->protpostea;   
      $incligne->protposteb = $request->protposteb; 
          
      $incligne->phasesa = $request->phasesa;
      $incligne->phasesb = $request->phasesb;
      $incligne->imputation = $request->imputation;   
      $incligne->stadea = $request->stadea;
      $incligne->stadeb = $request->stadeb;

      $incligne->ldefa = $request->ldefa; 
      $incligne->ldefb = $request->ldefb; 
      $incligne->observ = $request->observ;     
      $incligne->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.inclignes.index' , $incligne);

    }//end of store
        public function edit(Incligne $incligne)
        {
            $lignes = Ligne::all();

            return view('dashboard.inclignes.edit', compact('lignes','incligne'));

        }//end of edit

        public function show(Incligne $incligne)
        {
            $lignes = Ligne::all();
            return view('dashboard.ends.show' , compact('incligne' , 'lignes'));
      
        }//end of update


        public function update(Request $request, Incligne $incligne)
        {
            $rules = [' '];
            $request->validate($rules);
            
            $incligne->update($request->all());
            session()->flash('success', __('site.updated_successfully'));
            return redirect()->route('dashboard.inclignes.index');
      
        }//end of update

        public function destroy(Incligne $incligne)
        {
            $incligne->delete();
            session()->flash('success', __('site.deleted_successfully'));
            return redirect()->route('dashboard.inclignes.index');

        }//end of destroy

         public function export() 
        {

          return Excel::download(new InclignesExport, 'inclignes.xlsx');

        }

          public function import() 
        {
              Excel::import(new InclignesImport, 'inclignes.xlsx');
              return redirect()->route('dashboard.inclignes.index')->with('success', 'All good!');
        }



    }//end of controller