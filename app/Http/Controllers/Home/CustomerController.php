<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Notifications\CustomerNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $request['domain'] = $request->getHost();
        $request['theme'] = session('theme');
        $request['language'] = session('locale');
        $customer = Customer::create($request->all());
        try{
            Notification::route('mail', 'mrkiengmcc@gmail.com')->notify(new CustomerNotification($customer));
        }catch(Exception $err){
            Log::log("Email", $err);
        }
    }
}
