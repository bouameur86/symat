<?php

namespace App\Http\Controllers\Dashboard;

use App\Wilaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class WilayaController extends Controller
{
    public function index(Request $request)
    {

        $wilayas = Wilaya::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
            return $q->orWhere('code', 'like' ,'%' . $request->search . '%');

        })->latest()->paginate(8);

        return view('dashboard.wilayas.index', compact('wilayas'));

    }//end of index
    
    public function create()
    {
        return view('dashboard.wilayas.create');

    }//end of create

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code'=> 'required',
            'abrege'=> 'required',
      ]);
      $wilaya= new Wilaya(); 
      
      $wilaya->name = $request->name;
      $wilaya->code = $request->code; 
      $wilaya->abrege = $request->abrege; 
      $wilaya->save();

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.wilayas.index' , $wilaya);

    }//end of store

    public function edit(Wilaya $wilaya)
    {
        return view('dashboard.wilayas.edit', compact('wilaya'));

    }//end of edit

    public function update(Request $request, Wilaya $wilaya)
    {
        $rules = [];
        $request->validate($rules);

        $wilaya->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.wilayas.index');

    }//end of update

    public function destroy(Wilaya $wilaya)
    {
        $wilaya->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.wilayas.index');

    }//end of destroy

}//end of controller
