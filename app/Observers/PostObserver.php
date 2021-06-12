<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\ImageService;

class PostObserver
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
     * Handle the post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updating" event.
     *
     * @param Post $post
     * @return void
     */
    public function updating(Post $post)
    {
        if ($post->getOriginal('image') && $post->isDirty('image')) {
            $this->imageService->delete($post->getOriginal('image'));
        }
    }

    /**
     * Handle the post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $post->category()->detach();
        $this->imageService->deleteDirectory(config('constants.folder.post') . $post->id);
    }

    /**
     * Handle the post "restored" event.
     *
     * @param Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
