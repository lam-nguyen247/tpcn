<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Delete the url image file
     *
     * @param ImageService $imageService
     * @param Request $request
     */
    public function destroy(ImageService $imageService, Request $request)
    {
        $imageService->delete($request->url);
    }
}
