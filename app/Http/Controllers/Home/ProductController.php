<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
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
        $product = Product::with('comments')->find($id);

        return view('home.product.detail', compact(
            'product',
        ));
    }


    public function searchProduct(Request $request)
    {
        $products = $this->productService->search($request->all());
    }
}
