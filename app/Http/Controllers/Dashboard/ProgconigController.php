<?php

namespace App\Http\Controllers\Dashboard;

use App\Progconsig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProgconsigController extends Controller
{
    public function index(Request $request)
    {
        $progconsigs = Progconsig::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.progconsigs.index', compact('progconsigs'));

    }//end of index

    public function create()
    {
        return view('dashboard.progconsigs.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('progconsig_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Progconsig::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.progconsigs.index');

    }//end of store

    public function edit(Progconsig $progconsig)
    {
        return view('dashboard.progconsigs.edit', compact('progconsigs'));

    }//end of edit

    public function update(Request $request, Progconsig $progconsig)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Progconsig_translations', 'name')->ignore($progconsig->id, 'progconsig_id')]];

        }//end of for each

        $request->validate($rules);

        $progconsig->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.progconsigs.index');

    }//end of update

    public function destroy(Progconsig $progconsig)
    {
        $progconsig->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.progconsigs.index');

    }//end of destroy

}//end of controller
