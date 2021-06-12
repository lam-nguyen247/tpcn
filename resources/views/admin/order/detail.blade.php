@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-md-9 col-lg-9">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="mb-0 text-white">Đơn hàng ({{count($details)}} sản phẩm)</h5> <br>
                <h5 class="mb-0 text-white">Địa chỉ: {{$order->address}}</h5> <br>
                <h5 class="mb-0 text-white">Email: {{$order->email}}</h5> <br>
                <h5 class="mb-0 text-white">Thanh toán: {{$order->method}}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table product-overview">
                        <thead>
                            <tr>
                                <th>Cửa hàng</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Thuộc tính</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th style="text-align:center">Tổng</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @foreach ($details as $item)
                            <tr>
                                <th>{{$item->store_id==0?env('APP_NAME'):$item->store->store_name}}</th>
                                <td width="150"><img src="{{$item->product['image']}}" alt="iMac" width="80"></td>
                                <td width="550">
                                    <h5 class="font-500">{{$item->product['title']}}</h5>
                                    <p></p>
                                </td>
                                <td>
                                    @if ($item->product_property_id>0)
                                        {{$item->product['property_name']}}
                                    @endif
                                </td>
                                <td>{{number_format($item->product['price'],0,'.',',')}}đ</td>
                                <td>
                                    {{$item->qty}}
                                </td>
                                <td width="150" align="center" class="font-500">{{number_format($item->product['price']*$item->qty,0,'.',',')}}đ</td>
                                <td>
                                    <select onchange="updateDetailStatus({{$item->id}})" style="color: {{$item->color}}"  name="status_{{$item->id}}" id="status_{{$item->id}}">
                                        <option style="color:red" {{$item->status==1?'selected':''}} value="1">Mới</option>
                                        <option style="color:blue" {{$item->status==2?'selected':''}} value="2">Đang giao hàng</option>
                                        <option style="color:green"  {{$item->status==3?'selected':''}} value="3">Đã giao hàng</option>
                                        <option style="color:pink" {{$item->status==4?'selected':''}} value="4">Hủy bỏ</option>
                                        <option style="color:purple" {{$item->status==5?'selected':''}} value="5">Hoàn trả</option>
                                        <option style="color:orange" {{$item->status==6?'selected':''}} value="6">Hết hàng</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="d-flex no-block align-items-center">
                        <a  href="{{route('order.index')}}" class="btn btn-dark btn-outline"><i class="fas fa-arrow-left"></i> Trở về</a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Trạng thái</h5>  <div class="ml-auto">
                    <select onchange="updateStatus({{$order->id}})" style="color: {{$order->color}}"  name="status_{{$order->id}}" id="status_{{$order->id}}">
                        <option style="color:red" {{$order->status==1?'selected':''}} value="1">Mới</option>
                        <option style="color:blue" {{$order->status==2?'selected':''}} value="2">Đang giao hàng</option>
                        <option style="color:green"  {{$order->status==3?'selected':''}} value="3">Đã giao hàng</option>
                        <option style="color:pink" {{$order->status==4?'selected':''}} value="4">Hủy bỏ</option>
                        <option style="color:purple" {{$order->status==5?'selected':''}} value="5">Hoàn trả</option>
                    </select>
                </div>
                <hr>
                <small>Ưu đãi</small>
                <h2>-{{number_format($order->uudai,0,'.',',')}}</h2>
                <small>Phí ship</small>
                <h2>{{number_format($order->ship,0,'.',',')}}</h2>
                <small>Thành tiền</small>
                <h2>{{number_format($order->subTotal + $order->ship,0,'.',',')}}</h2>
                <a class="btn btn-success" href="{{route('admin.order.export',['id'=>$order->id])}}">Xuất Excel</a>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('css')
    <style>
        .dropify-message p {
            text-align: center;
        }
        .form-group .note-form-label {
            position: initial;
        }
    </style>
@endsection
@section('js')
<script>
    function updateStatus(id){
        if(id>0){
            $.ajax({
                type: 'POST',
                url: '/admin/order/updateStatus/'+id,
                data: {_token: '{{csrf_token()}}' ,id: id, status: $("#status_"+id).val()}
            }).done(function(res){
                $("#status_"+id).css('color',res);
            })
        }
    }

    function updateDetailStatus(id){
        if(id>0){
            $.ajax({
                type: 'POST',
                url: '/admin/order/updateDetailStatus/'+id,
                data: {_token: '{{csrf_token()}}' ,id: id, status: $("#status_"+id).val()}
            }).done(function(res){
                $("#status_"+id).css('color',res);
            })
        }
    }
</script>
@endsection