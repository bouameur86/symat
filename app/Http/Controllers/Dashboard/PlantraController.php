<?php

namespace App\Http\Controllers\Dashboard;

use App\Plantra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PlantraController extends Controller
{
    public function index(Request $request)
    {
        $plantras = Plantra::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.plantras.index', compact('plantras'));

    }//end of index

    public function create()
    {
        return view('dashboard.plantras.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Plantra_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Plantra::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.plantras.index');

    }//end of store

    public function edit(Plantra $plantra)
    {
        return view('dashboard.plantras.edit', compact('plantras'));

    }//end of edit

    public function update(Request $request, Plantra $plantra)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('plantra_translations', 'name')->ignore($plantra->id, 'plantra_id')]];

        }//end of for each

        $request->validate($rules);

        $plantra->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.plantras.index');

    }//end of update

    public function destroy(Plantra $plantra)
    {
        $plantra->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.plantras.index');

    }//end of destroy

}//end of controller
