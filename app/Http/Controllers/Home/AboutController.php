<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $path = 'about-us';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }
}
