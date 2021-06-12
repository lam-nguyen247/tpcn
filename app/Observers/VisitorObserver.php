<?php

namespace App\Observers;

use App\Models\Visitor;

class VisitorObserver
{
    /**
     * Handle the visitor "created" event.
     *
     * @param Visitor $visitor
     * @return void
     */
    public function created(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the visitor "updated" event.
     *
     * @param Visitor $visitor
     * @return void
     */
    public function updated(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the visitor "deleted" event.
     *
     * @param Visitor $visitor
     * @return void
     */
    public function deleted(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the visitor "restored" event.
     *
     * @param Visitor $visitor
     * @return void
     */
    public function restored(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the visitor "force deleted" event.
     *
     * @param Visitor $visitor
     * @return void
     */
    public function forceDeleted(Visitor $visitor)
    {
        //
    }
}
