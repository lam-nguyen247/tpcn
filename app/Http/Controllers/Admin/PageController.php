<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Services\PageService;
use Exception;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pageList = Page::all();
        return view('admin.page.index', compact('pageList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @param PageService $pageService
     * @return Response
     */
    public function store(PageRequest $request, PageService $pageService)
    {
        $pageService->store($request);
        return back()->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function edit(Page $page)
    {
        $seo = $page->seo;
        return view('admin.page.edit', compact('page', 'seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param Page $page
     * @param PageService $pageService
     * @return Response
     */
    public function update(PageRequest $request, Page $page, PageService $pageService)
    {
        $pageService->update($page, $request);
        return redirect()->route('page.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     * @throws Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', trans('Deleted successfully'));
    }
}
