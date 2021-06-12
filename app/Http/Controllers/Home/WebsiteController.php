<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function index()
    {
        $path = 'website-design';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }
}
