<?php

namespace App\Http\Controllers\Dashboard;

use App\Commune;

use App\Imports;
use App\Depart;
use Illuminate\Support\Facades\Validator;
use App\Transite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\TransitesExport;
use App\Imports\TransitesImport;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class TransiteController extends Controller
{
    
    public function index(Request $request)
    {
        $postes = Poste::all();
        $departs = Depart::all();
        $transites = Transite::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');

        })->when($request->depart_id, function ($q) use ($request) {

            return $q->orWhere('depart', 'like', '%'. $request->depart. '%');
        })->latest()->paginate(99999999);

        return view('dashboard.transites.index', compact( 'postes', 'departs','transites'));

    }//end of index


    public function upload()
    {
        return view('dashboard.transites.upload');
    }

    public function getdepartsname($id)                    
    {
      //  $names = DB::table("departs")->where("poste_id", $id)->pluck('name' , 'id');
     //   $nivus = DB::table("departs")->where("poste_id", $id)->pluck('nivU' , 'id');
          $departs = DB::table('departs')->where("poste_id", $id);
     //   $departs = [($names).($nivus)];
        return json_encode($departs);
    }
   
 
    public function create()
    { 
        $postes = Poste::all();
        $departs = Depart::all();
        $transites = Transite::all();
        
        return view('dashboard.transites.create' , compact('postes','departs' ,'transites'));
    }//end of create

    public function store(Request $request)
    {

      $this->validate($request, [
            'datetime' => 'required', 
            'poste' => 'required',
            'depart' => 'required',
            'tension' => 'required',
            'pactif' => 'required',
            'qreactif'=> 'required',
      ]);
      $transite= new Transite; 
      $transite->datetime = $request->datetime;
      $transite->poste_id = $request->poste;
      $transite->depart = $request->depart;
      $transite->tension = $request->tension;
      $transite->pactif = $request->pactif;
      $transite->qreactif = $request->qreactif;
      $transite->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.transites.index' , $transite);

    }//end of store

        
    public function edit(Transite $transite)
    {
        
        $postes = Poste::all();
        $departs = Depart::all();
        return view('dashboard.transites.edit', compact('postes','departs','transite'));

    }//end of edit

    public function update(Request $request, Transite $transite)
    {
        $rules = [ ' '];
        $request->validate($rules);
        
        $transite->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.transites.index');
  
    }//end of update

    public function destroy(Transite $transite)
    {
        $transite->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.transites.index');

    }//end of destroy

    //** 
    public function export() 
   {
     return Excel::download(new TransitesExport, 'transites liste.xlsx');
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
        Excel::queueImport(new TransitesImport(), $file);
        return redirect()->route('dashboard.transites.index');
  
    }


}//end of controller
