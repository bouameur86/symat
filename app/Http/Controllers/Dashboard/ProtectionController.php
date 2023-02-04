<?php

namespace App\Http\Controllers\Dashboard;

use App\Poste;
use App\Protection;
use App\Constructeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

class ProtectionController extends Controller
{
    
    public function index(Request $request)
    {

            $postes = Poste::all();
            $constructeurs = Constructeur::all(); 
            $protections = Protection::when($request->search, function ($q) use ($request) {
    
                return $q->where('name', 'like', '%' . $request->search . '%');
    
            })->when($request->poste_id, function ($q) use ($request) {
    
                return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');
    
    
            })->latest()->paginate(9900);
    
            return view('dashboard.protections.index', compact( 'postes','protections', 'constructeurs'));
        }

    public function create()
    { 
        $postes = Poste::all();
        $constructeurs = Constructeur::all();
        return view('dashboard.protections.create' ,compact('postes' , 'constructeurs'));

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'poste' => 'required',
            'code_prot'=> 'required',
            'name_prot' => 'required',
            'fonct' => 'required',
            'num_prot'=> 'required',
            'costructeur'=> 'required',
            'datemise'=> 'required',
            'etat'=> 'required',
            
      ]);
      $protection= new Protection; 
      $protection->poste_id = $request->poste;
      $protection->code_prot = $request->code_prot;
      $protection->name_prot = $request->name_prot;
      $protection->fonct = $request->fonct;
      $protection->constructeur = $request->constructeur;
      $protection->datemise= $request->datemise;
      $protection->etat= $request->etat;
      $protection->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.protections.index' , $protection);

    }//end of store

    public function edit(Protection $protection)
    {

        return view('dashboard.protections.edit', compact('protection'));

    }//end of edit

    public function update(Request $request, Protection $protection)
    {
        $rules = [''];
        $request->validate($rules);
        
        $protection->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.protections.index');
  
    }//end of update

    public function destroy(Protection $protection)
    {
        $protection->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.protections.index');

    }//end of destroy

}//end of controller
