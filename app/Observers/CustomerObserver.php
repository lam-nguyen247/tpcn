<?php

namespace App\Observers;

use App\Jobs\CustomerJob;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerObserver
{
    /**
     * Handle the customer "created" event.
     *
     * @param Customer $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        Log::info($customer->toJson(JSON_UNESCAPED_UNICODE));

        try {
            dispatch(new CustomerJob($customer));
        } catch (\Exception $e) {
            // NOP
        }
    }

    /**
     * Handle the customer "updated" event.
     *
     * @param Customer $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        //
    }

    /**
     * Handle the customer "deleted" event.
     *
     * @param Customer $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    /**
     * Handle the customer "restored" event.
     *
     * @param Customer $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the customer "force deleted" event.
     *
     * @param Customer $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}
