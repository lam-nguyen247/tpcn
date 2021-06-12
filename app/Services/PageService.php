<?php

namespace App\Services;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\Seo;

class PageService
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

    /**
     * Store page
     *
     * @param PageRequest $request
     */
    public function store(PageRequest $request)
    {
        $page = Page::create($request->except(array_merge(Seo::META_LIST, ['content'])));
        $this->save($page, $request);
    }

    /**
     * Update page
     *
     * @param Page $page
     * @param PageRequest $request
     */
    public function update(Page $page, PageRequest $request)
    {
        $page->update($request->except(array_merge(Seo::META_LIST, ['content'])));
        $this->save($page, $request);
    }

    /**
     * Save page
     *
     * @param Page $page
     * @param PageRequest $request
     */
    private function save(Page $page, PageRequest $request)
    {
        $page->content = $this->imageService->transformAll($request['content'], config('constants.folder.page') . $page->id);
        $page->save();
        $this->seoService->save($page, $request);
    }
}
