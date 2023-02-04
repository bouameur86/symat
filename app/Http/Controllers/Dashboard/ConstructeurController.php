<?php

namespace App\Http\Controllers\Dashboard;

use App\constructeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ConstructeurController extends Controller
{
    
    public function index(Request $request)
    {

            $constructeurs = Constructeur::when($request->search, function ($q) use ($request) {
    
                return $q->where('name', 'like', '%' . $request->search . '%');

            })->when($request->name, function ($q) use ($request) {
                
                return $q->orWhere('code', 'like' ,'%' . $request->code . '%');
    
            })->latest()->paginate(8);

    
                return view('dashboard.constructeurs.index', compact('constructeurs'));
    
        }//end of index
    public function create()
    { 
        return view('dashboard.constructeurs.create');

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'phone'=> 'required',
            'address'=> 'required',
      ]);
      $constructeur= new Constructeur; 
      $constructeur->name = $request->name;
      $constructeur->phone = $request->phone;
      $constructeur->address= $request->address;
      $constructeur->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.constructeurs.index' , $constructeur);

    }//end of store

    public function edit(Constructeur $constructeur)
    {

        return view('dashboard.constructeurs.edit', compact('constructeur'));

    }//end of edit

    public function update(Request $request, Constructeur $constructeur)
    {
        $rules = [ ];
        $request->validate($rules);
        
        $constructeur->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.constructeurs.index');
  
    }//end of update

    public function destroy(Constructeur $constructeur)
    {
        $constructeur->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.constructeurs.index');

    }//end of destroy

}//end of controller
