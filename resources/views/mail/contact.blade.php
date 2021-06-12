<!DOCTYPE html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
    <title>{{$customer->name}}</title>
    <meta content="text/html; charset=unicode" http-equiv=content-type>
<body>
<p style="font-size: 10pt; font-family: arial">
<table style="width: 100%" cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td style="font-size: 12pt; font-family: arial; color: #fff; padding: 1em; line-height: 1.7; background-color: rgba(19, 112, 181, 0.88);">
            Họ tên: {{$customer->name}}<br/>
            Số điện thoại: {{$customer->phone}}<br/>
            Địa chỉ: {{$customer->address}}<br/>
            Email: <a style="color: #fff; text-decoration: none" href="mailto:{{$customer->email}}">{{$customer->email}}</a><br/>
            Tiêu đề: {{$customer->subject}} <br/>
            Nội dung: {{$customer->content}}
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
