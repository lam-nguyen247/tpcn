<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\CustomerRequest;
use App\Models\Customer;
use App\Notifications\CustomerNotification;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function registerMember(CustomerRequest $request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($params['password']);
        $customer = Customer::create([
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'is_news_letter' => $params['is_news_letter'],
            'password' => $params['password']
        ]);
        try{
            // send mail
            // Notification::route('mail', 'mrkiengmcc@gmail.com')->notify(new CustomerNotification($customer));
            return response()->json([
               'success' => true,
               'message' => 'Đăng ký thành công'
            ]);
        }catch(Exception $err){
            Log::log("Email", $err);
        }
    }
}
