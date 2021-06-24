<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Excel;

class OrderController extends Controller
{
    public function index(){
        $listOrder = Order::orderBy('id', 'desc')->get();
        return view('admin.order.index', compact('listOrder'));
    }

    public function show($id){
        $order = Order::find($id)->load('addressShipping', 'listDetail', 'listDetail.product')->toArray();
        return view('admin.order.detail', compact('order'));
    }

    public function updateStatusOrder(Request $request, $id){
        $order = Order::find($id);
        if($request->status == 3){
            $order->payment = 1;
        }
        $order->status = $request->status;
        $order->save();

        return response()->json([
            'success' => true,
            'color' => $order->color
        ]);
    }

    public function updateDetailStatus(Request $request, $id){
        $order = OrderDetail::find($id);
        $order->status = $request->status;
        $order->save();
        return $order->color;
    }

    public function destroy(Order  $order)
    {
        OrderDetail::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->route('order.index');
    }

    public function export($id){
        return Excel::download(new ExcelController($id), 'orders_'.time().'.xlsx');
    }

    public function exportAll(){
        return Excel::download(new ExcelController(null), 'orders_'.time().'.xlsx');
    }
}
