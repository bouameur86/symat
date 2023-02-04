<?php

namespace App\Http\Controllers\Dashboard;

use App\Cm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmController extends Controller
{
    public function index(Request $request)
    {
        $cms = Cm::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.cms.index', compact('cms'));

    }//end of index

    public function create()
    {
        return view('dashboard.cms.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Cm::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.cms.index');

    }//end of store

    public function edit(Cm $Cm)
    {
        return view('dashboard.cms.edit', compact('Cm'));

    }//end of edit

    public function update(Request $request, Cm $Cm)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $Cm->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.cms.index');

    }//end of update

    public function destroy(Cm $Cm)
    {
        $Cm->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.cms.index');

    }//end of destroy

}//end of controller
