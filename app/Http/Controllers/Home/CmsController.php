<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Support\Facades\Cache;

class CmsController extends Controller
{
    public function index()
    {
        if (Cache::has('cms')) {
            $cms = Cache::get('cms');
        } else {
            $cms = Cms::all()->pluck('content', 'name');
            Cache::put('cms', $cms);
        }
        return $cms;
    }
}
