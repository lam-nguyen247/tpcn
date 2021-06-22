<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use http\Env\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $products = Product::orderBy('id', 'DESC')->simplePaginate(12);
        return view('home.index', compact(
            'agent',
            'products'
        ));
    }

    public function cart()
    {
        return view('home.cart.checkout');
    }

    public function pay()
    {
        return view('home.cart.pay');
    }
}
