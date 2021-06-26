@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-md-9 col-lg-9">
        <div class="card">
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h5 class="mb-0 text-white">Đơn hàng ({{count($order['list_detail'] ?? [])}} sản phẩm)</h5> <br>
                        <h5 class="mb-0 text-white">Họ và Tên: {{$order['name']}}</h5> <br>
                        <h5 class="mb-0 text-white">Số điện thoại : {{$order['phone']}}</h5> <br>
                        <h5 class="mb-0 text-white">Địa chỉ: {{$order['address']}}</h5> <br>
                        <h5 class="mb-0 text-white">Thanh toán: {{config('constants.method-payments')[$order['method']]}}</h5>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h5 class="mb-0 text-white"></h5><br>
                        <h5 class="mb-0 text-white">Địa chỉ nhận hàng</h5> <br>
                        <h5 class="mb-0 text-white">Họ và Tên: {{$order['address_shipping']['name']}}</h5> <br>
                        <h5 class="mb-0 text-white">Số điện thoại : {{$order['address_shipping']['phone']}}</h5> <br>
                        <h5 class="mb-0 text-white">Tỉnh : {{config('constants.country')[$order['address_shipping']['city']] ?? null}}</h5> <br>
                        <h5 class="mb-0 text-white">Địa chỉ: {{$order['address_shipping']['address']}}</h5> <br>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table product-overview">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th style="text-align:center">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @if(!empty($order['list_detail']))
                                @foreach ($order['list_detail'] as $item)
                                <tr>
                                    <td width="150"><img src="{{ url($item['product']['image']) }}" alt="iMac" width="80"></td>
                                    <td width="250" style="line-break: anywhere;">
                                        <h5 class="font-500">{{$item['product']['title']}}</h5>
                                        <p></p>
                                    </td>
                                    <td>
                                      {{ $item['product']['code'] }}
                                    </td>
                                    <td>{{number_format($item['product']['price'],0,'.',',')}}đ</td>
                                    <td>
                                        {{$item['qty']}}
                                    </td>
                                    <td width="150" align="center" class="font-500">{{number_format($item['product']['price']*$item['qty'],0,'.',',')}}đ</td>
                                </tr>
                                @endforeach
                            @endif
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
                    <select onchange="updateDetailStatus({{$order['id']}})" style="color: {{$order['color']}}"  name="status_{{$order['id']}}" id="status_{{$order['id']}}">
                        <option style="color:red" {{$order['status']==1?'selected':''}} value="1">Mới</option>
                        <option style="color:blue" {{$order['status']==2?'selected':''}} value="2">Đang giao hàng</option>
                        <option style="color:green"  {{$order['status']==3?'selected':''}} value="3">Đã giao hàng</option>
                        <option style="color:pink" {{$order['status']==4?'selected':''}} value="4">Hủy bỏ</option>
                        <option style="color:purple" {{$order['status']==5?'selected':''}} value="5">Hoàn trả</option>
                    </select>
                </div>
                <hr>
                <small>Phí ship</small>
                <h2>{{number_format($order['ship'],0,'.',',')}}</h2>
                <small>Thành tiền</small>
                <h2>{{number_format($order['subTotal'] + $order['ship'],0,'.',',')}}</h2>
{{--                <a class="btn btn-success" href="{{route('admin.order.export',['id'=>$order->id])}}">Xuất Excel</a>--}}
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
    function updateDetailStatus(id){
        if(id>0){
            $.ajax({
                type: 'POST',
                url: '{{ route('order.update-status-order', $order['id']) }}',
                data: {_token: '{{csrf_token()}}' ,id: id, status: $("#status_"+id).val()}
            }).done(function(res){
                if (res.success) {
                    $("#status_"+id).css('color',res.color);
                }
            })
        }
    }
</script>
@endsection
