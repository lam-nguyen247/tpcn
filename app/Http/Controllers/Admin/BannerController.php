<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\ImageService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('display_home', 1)->get();

        return view('admin.banner.index', compact('banners'));
    }

    public function store(Request $request, ImageService $imageService)
    {
        $params = $request->all();
        $arrInsert = [];
        foreach ($params['banner'] as $val) {
            if (isset($val['file']) && $val['file']) {
                $nameImage = $imageService->store($val['file'], config('constants.folder.banner'));
            }
            $arrInsert[] = [
                'name' => $val['name'],
                'image' => $nameImage ?? $val['image'],
                'display_home' => 1
            ];
        }

        if (!empty($arrInsert)) {
            foreach ($arrInsert as $value) {
                if ($value['name'] == 'banner_home') {
                    Banner::updateOrCreate([
                        'id' => '1'
                    ], $value);
                }
                if ($value['name'] == 'banner_blog') {
                    Banner::updateOrCreate([
                        'id' => '2'
                    ], $value);
                }
                if ($value['name'] == 'banner_left') {
                    Banner::updateOrCreate([
                        'id' => '3'
                    ], $value);
                }
                if ($value['name'] == 'banner_left2') {
                    Banner::updateOrCreate([
                        'id' => '4'
                    ], $value);
                }
            }
        }

        return redirect()->route('banner.index')->with('success', trans('Saved successfully'));
    }
}
