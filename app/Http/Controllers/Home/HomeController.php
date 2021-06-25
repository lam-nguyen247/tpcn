<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $products = Product::orderBy('id', 'DESC')->simplePaginate(12);
//        $post =
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

    public function questionIndex()
    {
        $questions = QuestionAnswer::whereNotNull('answer')->orderBy('id', 'DESC')->get();
        return view('home.question.index', compact('questions'));
    }

    public function addQuestion(Request $request)
    {
        $params = $request->all();
        QuestionAnswer::create([
            'name' => $params['txtname'],
            'email' => $params['txtmail'],
            'question' => $params['news_description']
        ]);

        return redirect()->route('home.question');
    }
}
