<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest;
use App\Models\Seo;
use Exception;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $seoList = Seo::all();
        return view('admin.seo.index', compact('seoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $seoList = Seo::all();
        return view('admin.seo.index', compact('seoList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SeoRequest $seoRequest
     * @return Response
     */
    public function store(SeoRequest $seoRequest)
    {
        Seo::create($seoRequest->all());
        return redirect()->route('seo.index')->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Seo $seo
     * @return Response
     */
    public function show(Seo $seo)
    {
        return view('admin.seo.show', compact('seo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seo $seo
     * @return Response
     */
    public function edit(Seo $seo)
    {
        $seoList = Seo::all();
        return view('admin.seo.index', compact('seo', 'seoList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SeoRequest $seoRequest
     * @param Seo $seo
     * @return Response
     */
    public function update(SeoRequest $seoRequest, Seo $seo)
    {
        $seo->update($seoRequest->all());
        return redirect()->route('seo.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seo $seo
     * @return Response
     * @throws Exception
     */
    public function destroy(Seo $seo)
    {
        $seo->delete();
        return back()->with('success', trans('Deleted successfully'));
    }
}
