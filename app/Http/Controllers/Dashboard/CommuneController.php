<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;
use App\Wilaya;
use Illuminate\Http\Request;
use App\Exports\CommunesExport;
use App\Imports\CommunesImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CommuneController extends Controller
{
    
    public function index(Request $request)
    {
        $wilayas = Wilaya::all();
        $communes = Commune::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->wilaya_id, function ($q) use ($request) {

            return $q->orWhere('wilaya_id', 'like', '%'. $request->wilaya_id . '%');

        })->latest()->paginate(999);

        return view('dashboard.communes.index', compact( 'wilayas' ,'communes'));

    }//end of index

    public function upload()
    {
        return view('dashboard.communes.upload');
    }

    public function create()
    { 
        $wilayas = Wilaya::all();
        return view('dashboard.communes.create' , compact('wilayas'));

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'wilaya'=> 'required',
            'code'=> 'required',
      ]);
      $commune= new Commune; 
      
      $commune->name = $request->name;
      $commune->wilaya_id = $request->wilaya; 
      $commune->code = $request->code;
      $commune->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.communes.index' , $commune);

    }//end of store


    public function edit(Commune $commune)
    {
        
        $wilayas = Wilaya::all();
        return view('dashboard.communes.edit', compact('wilayas','commune'));

    }//end of edit

    public function update(Request $request, Commune $commune)
    {
        $rules = [' '];
        $request->validate($rules);
        
        $commune->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.communes.index');
  
    }//end of update

    public function destroy(Commune $commune)
    {
        $commune->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.communes.index');

    }//end of destroy

    public function export() 
   {
      return Excel::download(new CommunesExport, 'communes liste.xlsx');

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
        Excel::queueImport(new CommunesImport(), $file);
        return redirect()->route('dashboard.communes.index');
     

    }





}//end of controller
