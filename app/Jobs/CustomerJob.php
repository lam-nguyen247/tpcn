<?php

namespace App\Jobs;

use App\Models\Configuration;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\CustomerNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class CustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * Create a new job instance.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = new User();
        $mailList = preg_split('/[;,]/', Configuration::where('name', 'email')->firstOrFail()->content);
        for ($i = 0; $i < count($mailList); $i++) {
            if (empty(trim($mailList[$i]))) {
                continue;
            }
            $user->email = trim($mailList[$i]);
            Notification::send($user, new CustomerNotification($this->customer));
        }
    }
}
