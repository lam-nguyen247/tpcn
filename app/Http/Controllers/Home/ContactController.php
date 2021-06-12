<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $path = 'contact';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }
}
