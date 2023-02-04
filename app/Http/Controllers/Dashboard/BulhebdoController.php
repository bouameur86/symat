<?php

namespace App\Http\Controllers\Dashboard;

use App\Bulhebdo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class BulhebdoController extends Controller
{
    public function index(Request $request)
    {
        $bulhebdos = Bulhebdo::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.bulhebdos.index', compact('bulhebdos'));

    }//end of index

    public function create()
    {
        return view('dashboard.bulhebdos.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('bulhebdo_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Bulhebdo::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.bulhebdos.index');

    }//end of store

    public function edit(Bulhebdo $bulhebdo)
    {
        return view('dashboard.bulhebdos.edit', compact('bulhebdos'));

    }//end of edit

    public function update(Request $request, Bulhebdo $bulhebdo)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('bulhebdo_translations', 'name')->ignore($bulhebdo->id, 'bulhebdo_id')]];

        }//end of for each

        $request->validate($rules);

        $bulhebdo->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.bulhebdos.index');

    }//end of update

    public function destroy(Bulhebdo $bulhebdo)
    {
        $bulhebdo->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.bulhebdos.index');

    }//end of destroy

}//end of controller
