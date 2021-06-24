@extends('admin.layouts.app')

@section('title', 'Đơn hàng')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
{{--                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('admin.order.exportAll') }}"><i class="fas fa-plus-circle"></i>Xuất tất cả</a>--}}
                    <h4 class="card-title">Danh Sách Đơn hàng</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table id="listOrder" class="table table-striped table-bordered display w-100">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listOrder as $key=>$order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name }}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{number_format($order->subTotal+$order->ship,0,'.',',')}}đ</td>
                                    <td>{{config('constants.method-payments')[$order->method] ?? null }}</td>
                                    <td class="{{$order->payment==1?'text-warning':'text-danger'}}">{{$order->paymentString}}</td>
                                    <td>
                                        <select onchange="updateStatus({{$order->id}})" style="color: {{$order->color}}"  name="status_{{$order->id}}" id="status_{{$order->id}}">
                                            <option style="color:red" {{$order->status==1?'selected':''}} value="1">Mới</option>
                                            <option style="color:blue" {{$order->status==2?'selected':''}} value="2">Đang giao hàng</option>
                                            <option style="color:green"  {{$order->status==3?'selected':''}} value="3">Đã giao hàng</option>
                                            <option style="color:pink" {{$order->status==4?'selected':''}} value="4">Hủy bỏ</option>
                                            <option style="color:purple" {{$order->status==5?'selected':''}} value="5">Hoàn trả</option>
                                        </select>
                                    </td>
                                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                    <td>
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                            <a href="{{ route('order.show', $order->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chi tiết đơn hàng">
                                                <i class="fas fa-bullseye"></i>
                                            </a>
{{--                                            <a href="{{ route('admin.order.export', $order->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Xuất Excel">--}}
{{--                                                <i class="fas fa-file-excel"></i>--}}
{{--                                            </a>--}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-inverse js-delete-sweetalert" title="Xóa" data-toggle="tooltip"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#listOrder').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );

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
</script>
@endsection
