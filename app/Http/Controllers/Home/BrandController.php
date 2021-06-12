<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $path = 'branding-design-posm';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }
}
