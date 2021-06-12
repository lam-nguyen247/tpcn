<!DOCTYPE html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
    <title>{{$store->full_name}}</title>
    <meta content="text/html; charset=unicode" http-equiv=content-type>
<body>
<p style="font-size: 10pt; font-family: arial">
<table style="width: 100%" cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td style="font-size: 12pt; font-family: arial; padding: 1em; line-height: 1.7;">
            Họ tên: {{$store->full_name}}<br/>
            Số điện thoại: {{$store->phone}}<br/>
            Địa chỉ: {{$store->address}}<br/>
            Email: <a style=" text-decoration: none" href="mailto:{{$store->email}}">{{$store->email}}</a><br/>
            Tên cửa hàng: {{$store->store_name}} <br/>
            Vui lòng click <a style="" href="{{url('/store/resetpassword/'.$store->id)}}">vào đây</a> để tạo mật khẩu mới.<br/>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
