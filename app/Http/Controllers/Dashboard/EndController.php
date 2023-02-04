<?php

namespace App\Http\Controllers\Dashboard;

use App\End;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\EndsExport;
use App\Imports\EndsImport;
use App\Poste;
use App\Protection;
use App\Region;
use App\Ste;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class EndController extends Controller
{
    
    public function index()
    {
   
        $ends = End::all();
        
        return view('dashboard.ends.index', compact('ends'));

    }//end of index

    public function create()
    { 
        $postes = Poste::all();
        $protections = Protection::all();
        return view('dashboard.ends.create' , compact('protections', 'postes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
         
            'poste' => 'required',
            'numtr' => 'required',
            'nivU' => 'required',
            'cause' => 'required',
            'evenement'=> 'required',
            'incident'=> 'required',
            'protection'=> 'required',
            'dateheured'=> 'required',
            'dateheuref' => 'required',
            'dure' => 'required',
         
            'pcoupe' => 'required',
            'energie' => 'required',
            'imputation' => 'required',
            'ouvcause' => 'required',
            'saifi' => 'required',
            'saidi' => 'required',
            'dhretour'=> 'required',
            'indispo' => 'required',
            'mgmp' => 'required',
      ]);

      $end= new End; 

      $end->poste_id = $request->poste;
      $end->numtr = $request->numtr;
      $end->nivU = $request->nivU;
      $end->cause = $request->cause; 

      $end->evenement = $request->evenement; 
      $end->incident = $request->incident; 
      $end->protection = $request->protection; 
      $end->dateheured = $request->dateheured;
      $end->dateheuref = $request->dateheuref;
      $end->dure = $request->dure;
     
      $end->pcoupe = $request->pcoupe;
      $end->energie = $request->energie;
      $end->imputation = $request->imputation;

      $end->ouvcause = $request->ouvcause;
      $end->saifi = $request->saifi;
      $end->saidi = $request->saidi;
      $end->dhretour = $request->dhretour;
      $end->indispo = $request->indispo;
      $end->mgmp = $request->mgmp;
     
      $end->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.ends.index' , $end);

    }//end of store
    public function edit(End $end)
    {
        $postes = Poste::all();

        return view('dashboard.ends.edit', compact('postes','end'));

    }//end of edit

    public function show(End $end)
    {
        $postes = Poste::all();
        return view('dashboard.ends.show' , compact('end' , 'postes'));
  
    }//end of update


    public function update(Request $request, End $end)
    {
        $rules = [' '];
        $request->validate($rules);
        
        $end->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.ends.index');
  
    }//end of update

    public function destroy(End $end)
    {
        $end->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.ends.index');

    }//end of destroy

  public function export() 
    {

      return Excel::download(new EndsExport, 'ends.xlsx');

    }

    public function import() 
  {
        Excel::import(new EndsImport, 'users.xlsx');
        return redirect()->route('dashboard.ends.index')->with('success', 'All good!');
   }



    }//end of controller