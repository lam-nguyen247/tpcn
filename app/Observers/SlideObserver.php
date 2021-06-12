<?php

namespace App\Observers;

use App\Models\Slide;
use App\Services\ImageService;

class SlideObserver
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Handle the slide "created" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function created(Slide $slide)
    {
        //
    }

    /**
     * Handle the slide "updating" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function updating(Slide $slide)
    {
        if ($slide->getOriginal('image') && $slide->isDirty('image')) {
            $this->imageService->delete($slide->getOriginal('image'));
        }
    }

    /**
     * Handle the slide "updated" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function updated(Slide $slide)
    {
        //
    }

    /**
     * Handle the slide "deleted" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function deleted(Slide $slide)
    {
        $this->imageService->delete($slide->image);
    }

    /**
     * Handle the slide "restored" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function restored(Slide $slide)
    {
        //
    }

    /**
     * Handle the slide "force deleted" event.
     *
     * @param Slide $slide
     * @return void
     */
    public function forceDeleted(Slide $slide)
    {
        //
    }
}
