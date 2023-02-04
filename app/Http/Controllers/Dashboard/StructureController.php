<?php

namespace App\Http\Controllers\Dashboard;

use App\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class StructureController extends Controller
{
    
    public function index()
    {
        $structures = Structure::all();
        return view('dashboard.structures.index', compact('structures'));

    }//end of index
    
    public function create()
    { 
        return view('dashboard.structures.create');

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'code'=> 'nullable',
            'phone'=> 'nullable',
            'address'=> 'nullable',
      ]);
      $structure= new Structure; 
      $structure->name = $request->name;
      $structure->code = $request->code;
      $structure->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.structures.index' , $structure);

    }//end of store

    public function edit(Structure $structure)
    {
        return view('dashboard.structures.edit', compact('structure'));

    }//end of edit

    public function update(Request $request, Structure $structure)
    {
        $rules = [ ];
        $request->validate($rules);
        $structure->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.structures.index');
  
    }//end of update

    public function destroy(Structure $structure)
    {
        $structure->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.structures.index');

    }//end of destroy

}//end of controller
