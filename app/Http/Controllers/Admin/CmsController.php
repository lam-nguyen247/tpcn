<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cmsList = Cms::all();
        return view('admin.cms.index', compact('cmsList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param ImageService $imageService
     * @return Response
     */
    public function store(Request $request, ImageService $imageService)
    {
        if ($request->file) {
            $request['content'] = $imageService->store($request->file, config('constants.folder.cms'));
        }
        return Cms::updateOrCreate(['name' => $request->name], $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cms $cms
     * @return Response
     * @throws Exception
     */
    public function destroy(Cms $cms)
    {
        $cms->delete();
        return back()->with('success', trans('Deleted successfully'));
    }
}
