<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <titl>Order Infor</titl>
</head>

<body>
    <h1>ZONEFOOD Nhận được đơn hàng của bạn!</h1>
    <h1>Chi tiết đơn hàng: </h1>
    @foreach($demo as $item)
    <div>
        <span>MÓN ĂN: {{$item->products->name}} </span>
        <span style="color: blue">SỐ LƯỢNG: {{$item->num}}</span>
    </div>
    @endforeach
    <h1>Tổng tiền:<span style="color: blue"> {{$total->total}}VNĐ</span></h1><br>

</body>

</html>