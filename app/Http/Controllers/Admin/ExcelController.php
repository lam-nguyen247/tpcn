<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelController extends Controller implements FromCollection, WithHeadings
{
    private $id;

    public function __construct($id)
    {   
        $this->id = $id;
    }
    public function collection(){
        if($this->id == null){
            $orders = Order::all();
            $sheet = array();
            foreach($orders as $order){
                foreach($order->listDetail as $key=>$row){
                    $sheet[] = array(
                        $order->id, 
                        isset($row->store->store_name)?$row->store->store_name:env('APP_NAME'),
                        $row->product['title'], 
                        $order->first_name. ' ' . $order->last_name,
                        $order->address,
                        $order->phone,
                        $row->product['price'],
                        $row->qty,
                        $row->qty*$row->product['price'],
                        $row->statusString
                    );
                }
            }
        }else{
            $order = Order::find($this->id);
            $sheet = array();
            foreach($order->listDetail as $key=>$row){
                $sheet[] = array(
                    $this->id, 
                    isset($row->store->store_name)?$row->store->store_name:env('APP_NAME'),
                    $row->product['title'], 
                    $order->first_name. ' ' . $order->last_name,
                    $order->address,
                    $order->phone,
                    $row->product['price'],
                    $row->qty,
                    $row->qty*$row->product['price'],
                    $row->statusString
                );
            }
        }
        return  (collect($sheet));
    }

    public function headings(): array
    {
        return [
            'ORDER ID',
            'Cửa hàng',
            'Tên sản phẩm',
            'Tên khách hàng',
            'Địa chỉ',
            'Số điện thoại',
            'Đơn giá',
            'Số lượng',
            'Thành tiền',
            'Trạng thái'
        ];
    }
}