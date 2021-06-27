<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\CommentsRequest;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Product;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $imageService;

    public function __construct(ProductService $productService, ImageService $imageService)
    {
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    public function show($id)
    {
        $product = Product::withCount('comments')->find($id);
        $productDiff = Product::where('id', '<>', $id)->inRandomOrder()->limit(7)->get();
        $page = Page::whereIn('slug', ['giao-hang', 'cam-ket'])->get();
        return view('home.product.detail', compact(
            'product',
            'productDiff',
            'page'
        ));
    }


    public function searchProduct(Request $request)
    {
        $products = $this->productService->search($request);

        return view('home.product.search', compact(
            'products',
        ));
    }

    public function postComments(CommentsRequest $request)
    {
        $params = $request->all();
        Comment::create([
            'name' => $params['name'],
            'product_id' => $params['product_id'],
            'content' => $params['comments'],
            'score' => $params['rating'],
            'status' => 1
        ]);

        return response()->json([
            'success' => true,
            'html' =>1
        ]);
    }

    public function ajaxComments(Request $request)
    {
        $params = $request->all();
        $commens = Comment::where('product_id', $params['product_id'])->paginate(5);

        return response()->json([
            'success' => true,
            'html' => view('home.product.include.list-comments', compact('commens'))->render()
        ]);
    }
}
