<?php

namespace App\Http\Controllers\Dashboard;

use App\Siege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class SiegeController extends Controller
{
    public function index(Request $request)
    {
        $sieges = Siege::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.sieges.index', compact('sieges'));

    }//end of index

    public function create()
    {
        return view('dashboard.sieges.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Siege_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Siege::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.sieges.index');

    }//end of store

    public function edit(Siege $Siege)
    {
        return view('dashboard.sieges.edit', compact('Siege'));

    }//end of edit

    public function update(Request $request, Siege $Siege)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Siege_translations', 'name')->ignore($Siege->id, 'Siege_id')]];

        }//end of for each

        $request->validate($rules);

        $Siege->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.sieges.index');

    }//end of update

    public function destroy(Siege $Siege)
    {
        $Siege->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.sieges.index');

    }//end of destroy

}//end of controller
