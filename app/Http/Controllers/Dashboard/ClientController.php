<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\Depart;
use App\Exports\ClientsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ClientsImport;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    
    public function index(Request $request)
    {
        $postes = Poste::all();
        $departs = Depart::all();
        $clients = Client::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->poste_id, function ($q) use ($request) {

            return $q->orWhere('poste_id', 'like', '%'. $request->poste_id . '%');

        })->latest()->paginate(999999);

        return view('dashboard.clients.index', compact( 'postes', 'clients'));

    }//end of index
    

    public function upload()
    {
        return view('dashboard.clients.upload');
    }

    public function getdeparts($id)                    
    {
      //  $names = DB::table("departs")->where("poste_id", $id)->pluck('name' , 'id');
     //   $nivus = DB::table("departs")->where("poste_id", $id)->pluck('nivU' , 'id');
          $departs = DB::table('departs')->where("poste_id", $id)->pluck('name' , 'id');
     //   $departs = [($names).($nivus)];

        return json_encode($departs);
    }




    public function create()
    { 
        $postes = Poste::all();
        $departs = Depart::all();
        return view('dashboard.clients.create', compact('postes','departs'));

    }//end of create

    public function store(Request $request)
    {
      $this->validate($request, [
            'cliname' => 'required',
            'poste'=> 'required',
            'depart'=> 'required',
            'uclient'=> 'required',
      ]);
      $client= new Client; 
      $client->cliname = $request->cliname;
      $client->poste_id = $request->poste;
      $client->depart= $request->depart;
      $client->uclient= $request->uclient;
      $client->save();
 
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.clients.index' , $client);

    }//end of store

    public function edit(Client $client)
    {
        $postes = Poste::all();
        return view('dashboard.clients.edit', compact('postes','client'));

    }//end of edit

    public function update(Request $request, Client $client)
    {
        $rules = [ ''];
        $request->validate($rules);
        
        $client->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');
  
    }//end of update

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destroy


    public function export() 
    {
      return Excel::download(new ClientsExport, 'clients_liste.xlsx');
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
         Excel::queueImport(new ClientsImport(), $file);
         return redirect()->route('dashboard.clients.index');
   
     }
}//end of controller
