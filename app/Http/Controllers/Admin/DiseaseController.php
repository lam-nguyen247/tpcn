<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiseaseRequest;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $diseases = Disease::all();

        return view('admin.disease.index', compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiseaseRequest $request
     * @return Response
     */
    public function store(DiseaseRequest $request)
    {
        $arr_add = ['slug' => Str::slug($request->name)];
        $arr_add['order'] = 0;
        $request->request->add($arr_add);

        Disease::create($request->all());
        return back()->with('success', trans('Saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        $diseases = Disease::all();
        $disease = Disease::find($id);

        return view('admin.disease.index', compact('diseases', 'disease'));
    }

    /**
     * Update the specified resource in storage.
     * @return Response
     */
    public function update(DiseaseRequest $request, $id)
    {
        $disease = Disease::find($id);
        if (!empty($disease)) {
            $disease->update($request->all());
        }

        return redirect()->route('diseases.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exceptions
     */
    public function destroy(Disease $category)
    {
        $category->delete();
        return redirect()->route('diseases.index', $category->masterCategory->name)->with('success', trans('Deleted successfully'));
    }
}
