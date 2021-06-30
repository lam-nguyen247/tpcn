<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailNewOrder;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuestionAnswer;
use App\Models\Slide;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::find(1);
        $seo = $page->seo;
        $agent = new Agent();
        $products = Product::orderBy('id', 'DESC')->simplePaginate(12);
        $slide = Slide::orderBy('order', 'ASC')->get();
        $banner = Banner::all();
        $post = Post::inRandomOrder()->limit(8)->get();
        $postNew = Post::orderBy('id', 'DESC')->limit(2)->get();
        return view('home.index', compact(
            'agent',
            'products',
            'slide',
            'banner',
            'post',
            'postNew',
            'seo'
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

    public function getQuestionOften()
    {
        $questions = ProductCategory::with(['question' => function ($query) {
            return $query->orderBy('created_at', 'DESC')->limit(5);
        }])->get();

        return view('home.page.question-category', compact('questions'));
    }

    public function getQuestionCategory(Request $request)
    {
        $params = $request->all();
        $questionCategory = QuestionAnswer::whereHas('productCategory', function($query) use ($params) {
            return $query->where('slug', $params['search']);
        })->with(['productCategory'])->paginate(12);

        return view('home.page.index', compact('questionCategory'));
    }

    public function getQuestionDetail($id)
    {
        $questionDetail = QuestionAnswer::find($id);

        return view('home.page.index', compact('questionDetail'));
    }
}
