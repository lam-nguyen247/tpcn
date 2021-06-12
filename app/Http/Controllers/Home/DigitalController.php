<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class DigitalController extends Controller
{
    public function index()
    {
        $path = 'digital-marketing';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }
}
