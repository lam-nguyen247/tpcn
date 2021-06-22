<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cms;

class CmsController extends Controller
{
    public function index()
    {
        return Cms::all()->pluck('value', 'key');
    }
}
