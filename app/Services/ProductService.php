<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\MasterCategory;
use App\Models\Post;
use App\Models\Product;
use App\Models\Disease;
use App\Models\Seo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService
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

    public function search($request)
    {
        $data = $this->modalSearch($request);

        return $data;
    }

    private function modalSearch ($request)
    {
        $query = Product::query();

        $query->when(request('name'), function ($subQuery) use ($request){
            $name = Str::slug($request->name);
            return $subQuery->whereHas('productCategory', function($qe) use ($name) {
                return $qe->where('slug', 'LIKE', '%' . $name . '%');
            })->orWhere('slug', 'LIKE', '%' . $name . '%');
        });

        $query->when(request('category'), function ($subQuery) use ($request){
            $category = Str::slug($request->category);
            return $subQuery->whereHas('productCategory', function($qe) use ($category) {
                return $qe->where('slug', 'LIKE', '%' . $category . '%');
            });
        });

        $query->when(request('price'), function ($subQuery) use ($request){
            $price = explode(',', $request->price);
            if ((isset($price[0]) && $price[0]) && (isset($price[1]) && $price[1])) {
                return $subQuery->whereBetween('price', [$price[0], $price[1]]);
            }
            if ((isset($price[0]) && $price[0])) {
                return $subQuery->where('price', '> ', $price[0]);
            }
            return $subQuery->whereNull('price');
        });

        $query->when(request('sick'), function ($subQuery) use ($request){
            $sick = $request->sick;
            $idDisease = Disease::select('id')->where('slug', $sick)->first() ?? 0;
            if (!empty($idDisease)) {
                $idDisease = $idDisease->id;
            }
            return $subQuery->whereRaw(DB::raw('FIND_IN_SET(' . $idDisease . ', `disease_id`)>0'));

        });

        return $query->simplePaginate(12);
    }
}
