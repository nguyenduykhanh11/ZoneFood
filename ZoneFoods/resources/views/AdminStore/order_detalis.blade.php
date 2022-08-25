<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="" style="padding-top: 50px; margin-top: 50px;">
    <div class="col-md-12 table-responsive">


        <table class="table table-bordered table-hover" style="margin-top: 20px;">
            <thead>
            <tr>
                <th>STT</th>
                <th>tên món</th>
                <th>hình ảnh</th>
                <th>giá</th>
                <th>num</th>
                <th>thành tiền</th>


            </tr>
            </thead>
            <tbody>

            <input type="hidden" value="{{$index = 0}}">

            @foreach($order_details as $order)
                <tr >
                    <th>{{++$index}}</th>
                    <td>{{$order->products->name}}</td>
                    @foreach($order->products->product_images as $image_order)
                        <td><img style="height: 60px" src="{{asset('ImageUploads/'.$image_order->image)}}"></td>
                    @endforeach
                    <td>{{$order->products->prince}}</td>
                    <td>{{$order->num}}</td>
                    <td>{{$order->num * $order->products->prince}}</td>

                </tr>@endforeach





            </tbody>
        </table>
        <h4>Tổng tiền: {{$order->total}}</h4>
    </div>
</div>
</body>
</html>
