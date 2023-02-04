<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Str;
use App\Anomalieexp;
use App\End;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\EndExport;
use App\Imports\EndsImport;
use App\Poste;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class AnomalieexpController extends Controller
{
    


    
    public function index()
    {
   
        $anomalieexps = Anomalieexp::all();
        $postes = Poste::all();
        
        return view('dashboard.anomalieexps.index', compact('anomalieexps' , 'postes'));

    }//end of index

    public function create()
    { 
        $postes = Poste::all();

        return view('dashboard.anomalieexps.create' , compact('postes'));
    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
         
            'numes' => 'required',
            'dateanom' => 'required',
            'poste' => 'required',
            'equipement'=> 'required',
            'spequip'=> 'required',
            'nivU' => 'required',
            'typeanom'=> 'required',
            'anomalie' => 'required',
            'descranom' => 'required',
            'leon' => 'required',
      ]);

      $anomalieexp= new Anomalieexp; 

      $anomalieexp->numes = $request->numes;
      $anomalieexp->dateanom = $request->dateanom;
      $anomalieexp->poste_id = $request->poste;
      $anomalieexp->equipement = $request->equipement;
      $anomalieexp->spequip = $request->spequip;
      $anomalieexp->nivU = $request->nivU;
      $anomalieexp->typeanom= $request->typeanom;
      $anomalieexp->anomalie = $request->anomalie; 
      $anomalieexp->descranom = $request->descranom; 
      $anomalieexp->leon = $request->leon; 

      $anomalieexp->save();


 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.anomalieexps.index' , $anomalieexp);

    }//end of store
    public function edit(Anomalieexp $anomalieexp)
    {
        $postes = Poste::all();

        return view('dashboard.anomalieexps.edit', compact('postes','anomalieexp'));

    }//end of edit

    public function update(Request $request, Anomalieexp $anomalieexp)
    {
        $rules = [' '];
        $request->validate($rules);
        
        $anomalieexp->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.anomalieexps.index');
  
    }//end of update

    public function show(Anomalieexp $anomalieexp)
    {
        $postes = Poste::all();
        return view('dashboard.anomalieexps.show' , compact('anomalieexp' , 'postes'));
  
    }//end of update



    public function destroy(Anomalieexp $anomalieexp)
    {
        $anomalieexp->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.anomalieexps.index');

    }//end of destroy

//  public function export() 
  //  {

   //     return Excel::download(new EndExport, 'ends.xlsx');

   // }

  //  public function import() 
//    {
    //    Excel::import(new EndsImport, 'users.xlsx');
    //    return redirect()->route('dashboard.ends.index')->with('success', 'All good!');
 //   }



    }//end of controller
