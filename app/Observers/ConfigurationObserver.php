<?php

namespace App\Observers;

use App\Models\Configuration;
use Illuminate\Support\Facades\Cache;

class ConfigurationObserver
{
    /**
     * Handle the configuration "creating" event.
     *
     * @param Configuration $configuration
     * @return void
     */
    public function creating(Configuration $configuration)
    {
        Cache::forget('config');
    }

    /**
     * Handle the configuration "updating" event.
     *
     * @param Configuration $configuration
     * @return void
     */
    public function updating(Configuration $configuration)
    {
        Cache::forget('config');
    }
}
