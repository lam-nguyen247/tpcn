<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $postList = $this->postService->getPostList()->get();
        return view('admin.post.index', compact('postList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categoryList = $this->postService->getCategoryList();
        return view('admin.post.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param PostService $postService
     * @return Response
     */
    public function store(PostRequest $request, PostService $postService)
    {
        $postService->store($request);
        return back()->with('success', trans('Saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return void
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        $categoryList = $this->postService->getCategoryList();
        $seo = $post->seo;
        return view('admin.post.edit', compact('post', 'categoryList', 'seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @param PostService $postService
     * @return Response
     */
    public function update(PostRequest $request, Post $post, PostService $postService)
    {
        $postService->update($post, $request);
        return redirect()->route('post.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', trans('Deleted successfully'));
    }
}
