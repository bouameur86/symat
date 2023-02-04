<?php

namespace App\Http\Controllers\Dashboard;

use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    
    public function index()
    {
        $regions = Region::all();
        return view('dashboard.regions.index', compact('regions'));

    }//end of index
    
    public function create()
    { 
        return view('dashboard.regions.create');

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'code'=> 'nullable',
            'phone'=> 'nullable',
            'address'=> 'nullable',
      ]);
      $region= new Region; 
      $region->name = $request->name;
      $region->code = $request->code;
      $region->phone= $request->phone;
      $region->address= $request->address;
      $region->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.regions.index' , $region);

    }//end of store

    public function edit(Region $region)
    {

        return view('dashboard.regions.edit', compact('region'));

    }//end of edit

    public function update(Request $request, Region $region)
    {
        $rules = [ ];
        $request->validate($rules);
        
        $region->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.regions.index');
  
    }//end of update

    public function destroy(Region $region)
    {
        $region->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.regions.index');

    }//end of destroy

}//end of controller
