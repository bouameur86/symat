<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;
use App\Exports\StesExport;
use App\Region;
use App\Ste;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StesImport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class SteController extends Controller
{
    
    public function index(Request $request)
    {
        $regions = Region::all();
        $communes = Commune::all();
        $stes = Ste::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->when($request->region_id, function ($q) use ($request) {

            return $q->orWhere('region_id', 'like', '%'. $request->region_id . '%');

        })->when($request->commune_id, function ($q) use ($request) {

            return $q->orWhere('commune_id', 'like', '%'. $request->commune_id . '%');


        })->latest()->paginate(9900);

        return view('dashboard.stes.index', compact( 'regions','communes','stes'));

    }//end of index

    public function upload()
    {
        return view('dashboard.stes.upload');
    }

    public function create()
    { 
        $communes = Commune::all();
        $regions = Region::all();
        return view('dashboard.stes.create' , compact( 'communes', 'regions'));

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'code'=> 'required',
            'commune'=> 'required|unique:stes,id',
            'region'=> 'required',
            'address'=> 'required',
      ]);
      $ste= new Ste; 
      
      $ste->name = $request->name;
      $ste->code = $request->code;
      $ste->commune_id = $request->commune;
      $ste->region_id = $request->region; 
      $ste->address = $request->address;

      $ste->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.stes.index' , $ste);

    }//end of store


    public function edit(Ste $ste)
    {
        $regions = Region::all();
        $communes = Commune::all();
        return view('dashboard.stes.edit', compact('communes', 'regions' ,'ste'));

    }//end of edit

    public function update(Request $request, Ste $ste)
    {
        
        $rules = [' '];
        $request->validate($rules);
        
        $ste->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.stes.index');
  
    }//end of update

    public function destroy(Ste $ste)
    {
        $ste->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.stes.index');

    }//end of destroy

    public function export() 
   {
      return Excel::download(new StesExport, 'stes liste.xlsx');

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
        Excel::queueImport(new StesImport(), $file);
        return redirect()->route('dashboard.stes.index');
     

    }


}//end of controller
