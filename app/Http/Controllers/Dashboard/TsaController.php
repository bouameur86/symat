<?php

namespace App\Http\Controllers\Dashboard;

use App\Tsa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class TsaController extends Controller
{
    public function index(Request $request)
    {
        $tsas = Tsa::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.tsas.index', compact('tsas'));

    }//end of index

    public function create()
    {
        return view('dashboard.tsas.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Tsa_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Tsa::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.tsas.index');

    }//end of store

    public function edit(Tsa $Tsa)
    {
        return view('dashboard.tsas.edit', compact('Tsa'));

    }//end of edit

    public function update(Request $request, Tsa $Tsa)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Tsa_translations', 'name')->ignore($Tsa->id, 'Tsa_id')]];

        }//end of for each

        $request->validate($rules);

        $Tsa->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.tsas.index');

    }//end of update

    public function destroy(Tsa $Tsa)
    {
        $Tsa->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.tsas.index');

    }//end of destroy

}//end of controller
