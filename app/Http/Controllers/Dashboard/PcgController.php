<?php

namespace App\Http\Controllers\Dashboard;

use App\Pcg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PcgController extends Controller
{
    public function index(Request $request)
    {
        $Pcgs = Pcg::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.Pcgs.index', compact('Pcgs'));

    }//end of index

    public function create()
    {
        return view('dashboard.Pcgs.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Pcg_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Pcg::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.Pcgs.index');

    }//end of store

    public function edit(Pcg $Pcg)
    {
        return view('dashboard.Pcgs.edit', compact('Pcg'));

    }//end of edit

    public function update(Request $request, Pcg $Pcg)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Pcg_translations', 'name')->ignore($Pcg->id, 'Pcg_id')]];

        }//end of for each

        $request->validate($rules);

        $Pcg->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.Pcgs.index');

    }//end of update

    public function destroy(Pcg $Pcg)
    {
        $Pcg->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.Pcgs.index');

    }//end of destroy

}//end of controller
