<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;

use App\Imports;
use Illuminate\Support\Facades\Validator;
use App\Depart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\DepartsExport;
use App\Imports\DepartsImport;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class DepartController extends Controller
{
    
    public function index(Request $request)
    {
        $postes = Poste::all();
        $departs = Depart::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');

        })->latest()->paginate(999999);

        return view('dashboard.departs.index', compact( 'postes', 'departs'));

    }//end of index


    public function upload()
    {
        return view('dashboard.departs.upload');
    }

    public function create()
    { 
        $postes = Poste::all();
        return view('dashboard.departs.create' , compact('postes'));
    }//end of create

    public function store(Request $request)
    {

      $this->validate($request, [
            'poste' => 'required',
            'name' => 'required',
            'nivU' => 'required',
            'saparent' => 'required',
            'etat'=> 'required',
      ]);

      $depart= new Depart; 
      $depart->poste_id = $request->poste;
      $depart->name = $request->name;
      $depart->nivU = $request->nivU;
      $depart->saparent = $request->saparent;
      $depart->etat = $request->etat;
      $depart->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.departs.index' , $depart);

    }//end of store

        
    public function edit(Depart $depart)
    {
        
        $postes = Poste::all();
        return view('dashboard.departs.edit', compact('postes','depart'));

    }//end of edit

    public function update(Request $request, Depart $depart)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $depart->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.departs.index');
  
    }//end of update

    public function destroy(Depart $depart)
    {
        $depart->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.departs.index');

    }//end of destroy

    //** 
    public function export() 
   {
     return Excel::download(new DepartsExport, 'departs liste.xlsx');
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
        Excel::queueImport(new DepartsImport(), $file);
        return redirect()->route('dashboard.departs.index');
  
    }

}//end of controller
