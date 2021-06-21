<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;
    private $imageService;
    private $categoryService;

    public function __construct(PostService $postService, ImageService $imageService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->imageService = $imageService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $path = 'news';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }

        $postList = $this->postService->getPostList()->simplePaginate(12);
        return view('home.post.index', compact('postList'));
    }

    public function detail($news, Post $post)
    {
        $path = 'news';
        if (request()->segment(1) != trans($path)) {
            return redirect(trans($path));
        }
        $seo = $post->seo;
        $menuList = $this->imageService->getMenuList($post->content);

        $postList = $this->postService->getPostList()->limit(5)->get();
        return view('home.post.detail', compact('menuList', 'post', 'seo', 'postList'));
    }

    public function searchPost(Request $request)
    {
        $postList = $this->postService->getPostListCategory($request->all())->paginate(7);

        return view('home.post.index', compact('postList'));
    }

    public function groupPostCategory()
    {
        $groupPostCategory = $this->postService->getGroupPost();

        return view('home.post.index', compact('groupPostCategory'));
    }

    public function detailPost($id)
    {
        $detailPost = Post::find($id);

        return view('home.post.index', compact('detailPost'));
    }
}
