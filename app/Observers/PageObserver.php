<?php

namespace App\Observers;

use App\Models\Page;
use App\Services\ImageService;

class PageObserver
{
    /**
     * @var ImageService
     */
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Handle the page "created" event.
     *
     * @param Page $page
     * @return void
     */
    public function created(Page $page)
    {
        //
    }

    /**
     * Handle the page "updated" event.
     *
     * @param Page $page
     * @return void
     */
    public function updated(Page $page)
    {
        //
    }

    /**
     * Handle the page "deleted" event.
     *
     * @param Page $page
     * @return void
     */
    public function deleted(Page $page)
    {
        $this->imageService->deleteDirectory(config('constants.folder.page') . $page->id);
    }

    /**
     * Handle the page "restored" event.
     *
     * @param Page $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the page "force deleted" event.
     *
     * @param Page $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }
}
