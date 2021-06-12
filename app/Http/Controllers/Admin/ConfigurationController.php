<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return Response
     */
    public function index(string $slug)
    {
        if (!view()->exists('admin.configuration.' . $slug)) {
            return redirect('/');
        }

        return view('admin.configuration.' . $slug);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        foreach ($request->except('_token') as $name => $content) {
            Configuration::updateOrCreate(['name' => $name], ['content' => $content]);
        }
        return back()->with('success', trans('Saved successfully'));
    }
}
