<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $slideList = Slide::orderByRaw('`order` is null, `order`')->get();
        return view('admin.slide.index', compact('slideList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SlideRequest $request
     * @param ImageService $imageService
     * @return Response
     */
    public function store(SlideRequest $request, ImageService $imageService)
    {
        $request['image'] = $imageService->store($request->file, config('constants.folder.slide'));
        Slide::create($request->all());
        return redirect()->route('slide.index')->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Slide $slide
     * @return Response
     */
    public function show(Slide $slide)
    {
        return view('admin.slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slide $slide
     * @return Response
     */
    public function edit(Slide $slide)
    {
        $slideList = Slide::orderByRaw('`order` is null, `order`')->get();
        return view('admin.slide.index', compact('slide', 'slideList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SlideRequest $request
     * @param Slide $slide
     * @param ImageService $imageService
     * @return Response
     */
    public function update(SlideRequest $request, Slide $slide, ImageService $imageService)
    {
        if ($request->file) {
            $request['image'] = $imageService->store($request->file, config('constants.folder.slide'));
        }
        $slide->update($request->all());
        return redirect()->route('slide.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slide $slide
     * @return Response
     * @throws Exception
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('slide.index')->with('success', trans('Deleted successfully'));
    }

    public function order(Request $request)
    {
        foreach ($request->except('_token') as $id => $order) {
            Slide::updateOrCreate(['id' => $id], ['order' => $order]);
        }
        return trans('Saved successfully');
    }
}
