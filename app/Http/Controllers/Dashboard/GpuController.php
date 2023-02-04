<?php

namespace App\Http\Controllers\Dashboard;

use App\Gpu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class GpuController extends Controller
{
    public function index(Request $request)
    {
        $gpus = Gpu::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.gpus.index', compact('gpus'));

    }//end of index

    public function create()
    {
        return view('dashboard.gpus.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Gpu_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Gpu::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.gpus.index');

    }//end of store

    public function edit(Gpu $Gpu)
    {
        return view('dashboard.gpus.edit', compact('Gpu'));

    }//end of edit

    public function update(Request $request, Gpu $Gpu)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('Gpu_translations', 'name')->ignore($Gpu->id, 'Gpu_id')]];

        }//end of for each

        $request->validate($rules);

        $Gpu->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.gpus.index');

    }//end of update

    public function destroy(Gpu $Gpu)
    {
        $Gpu->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.gpus.index');

    }//end of destroy

}//end of controller
