<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\MasterCategory;
use App\Models\Post;
use App\Models\Seo;

class PostService
{
    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * @var SeoService
     */
    private $seoService;

    public function __construct(ImageService $imageService, SeoService $seoService)
    {
        $this->imageService = $imageService;
        $this->seoService = $seoService;
    }

    public function getPostList()
    {
        return Post::where('language', app()->getLocale())->latest();
    }

    public function getCategoryList()
    {
        return MasterCategory::whereName('posts')->first()->categoryList;
    }

    /**
     * Store post
     *
     * @param PostRequest $request
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->except(array_merge(Seo::META_LIST, ['image', 'content'])));
        $this->save($post, $request);
    }

    /**
     * Update post
     *
     * @param Post $post
     * @param PostRequest $request
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->except(array_merge(Seo::META_LIST, ['image', 'content'])));
        $this->save($post, $request);
    }

    /**
     * Save post
     *
     * @param Post $post
     * @param PostRequest $request
     */
    private function save(Post $post, PostRequest $request)
    {
        if ($request->file) {
            $post->image = $this->imageService->store($request->file, config('constants.folder.post') . $post->id);
        }
        $post->content = $this->imageService->transformAll($request['content'], config('constants.folder.post') . $post->id);
        $post->save();
        $post->category()->sync($request->category_id);
        $this->seoService->save($post, $request);
    }
}
