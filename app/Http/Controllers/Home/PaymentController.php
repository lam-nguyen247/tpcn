<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AddressPaypal;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $params = $request->all();
        try {
            DB::transaction(function() use ($params){
                $products = json_decode($params['products'], true);
                $total = 0;
                if (!empty($products)) {
                    $totalProduct = array_map( function($prod) {
                        return $prod['price'] * (int)$prod['qty'];
                    }, $products);

                    $total = array_sum($totalProduct);
                }
                $order = Order::create([
                    'name' => $params['payment_name'],
                    'phone' => $params['payment_phone'],
                    'city' => $params['payment_city'],
                    'address' => $params['payment_address'],
                    'note' => $params['note'],
                    'method' => $params['payment'],
                    'ship' => 10000,
                    'subTotal' => $total,
                ]);
                // add address shipping
                $this->createAddressShip($params, $order);

                // create order detail
                $this->createOrderDetail($products, $order);

                // cart Item
                $data = [];
                $cartProduct = OrderDetail::with('product')->where('order_id', $order->id)->get();
                foreach ($cartProduct as $value) {
                    $data[] = [
                        'name' => $value->product->title,
                        'image' => $value->product->image,
                        'qty' => $value->qty,
                        'price' => (int)$value->product->price
                    ];
                }

                Notification::route('mail', 'euecopharma@gmail.com')->notify(new OrderNotification($order, $data));
            });

            return response()->json([
                'success' => true,
                'data' => []
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function createAddressShip($params, $order)
    {
        $data = [];
        if ($params['shipping_same_payment'] == 1) {
            $data = [
                'order_id' => $order->id,
                'name' => $params['payment_name'],
                'phone' => $params['payment_phone'],
                'city' => $params['payment_city'],
                'address' => $params['payment_address'],
            ];
        }

        if ($params['shipping_same_payment'] == 0) {
            $data = [
                'order_id' => $order->id,
                'name' => $params['shipping_name'],
                'phone' => $params['shipping_phone'],
                'city' => $params['shipping_city'],
                'district' => null,
                'address' => $params['shipping_address'],
            ];
        }

        if(!empty($data)) {
            AddressPaypal::create($data);
        }
    }

    private function createOrderDetail($arrProducts, $order)
    {
        if (!empty($arrProducts)) {
            $arrInsert = [];
            foreach ($arrProducts as $val) {
                $arrInsert[] = [
                    'order_id' => $order->id,
                    'product_id' => $val['product_id'],
                    'qty' => $val['qty']
                ];
            }

            if (!empty($arrInsert)) {
                OrderDetail::insert($arrInsert);
            }
        }
    }
}
