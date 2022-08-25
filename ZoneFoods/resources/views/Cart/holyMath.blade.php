
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    {{--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <style>

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width:20%;
                display: inline !important;
            }

            .actions .btn {
                width:36%;
                margin:1.5em 0;
            }

            .actions .btn-info {
                float:left;
            }

            .actions .btn-danger {
                float:right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width:320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }

            table#cart tfoot td {
                display:block;
            }
            table#cart tfoot td .btn {
                display:block;
            }
        }</style>
    <title>Cart</title>

</head>
<body>
<h2 class="text-center">Gior hang</h2>
<a href="/cart">Giỏ hàng</a>
<div class="container">
    <p>Đơn đang chờ</p>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:5%">STT</th>
            <th style="width:30%">Tên món</th>
            <th style="width:10%">Giá</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Tổng tiền</th>
            <th style="width:10%"> </th>
        </tr>
        </thead>
        @if($_SESSION['id']!='')
            <tbody>

{{--            @foreach($order_details as $order_detailss)--}}

{{--                @foreach($order_detailss->order_details as $image)--}}


{{--                    <tr>--}}
{{--                        <td data-th="Subtotal" class="text-center">{{$i+=1}}</td>--}}

{{--                        <td data-th="Product">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-2 hiddex-xs">--}}
{{--                                    @foreach($order_detailss->products->product_images as $image)--}}
{{--                                        <img class="card-img-top img-responsive"  width="100" src="{{asset('ImageUploads/'.$image->image)}}" alt="..." />--}}

{{--                                    @endforeach--}}
{{--                                    @foreach($image->products->product_images as $image3)--}}

{{--                                        <img class="card-img-top img-responsive"  src="{{asset('ImageUploads/'.$image3->image)}}">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    <h4 class="nomargin">Sản phẩm {{$i}} </h4>--}}
{{--                                    <p>{{$image->products->name}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td data-th="Subtotal" class="text-center">{{$image->products->prince}} đ</td>--}}
{{--                        <td data-th="Subtotal" class="text-center"><p>{{$image->num}}</p></td>--}}
{{--                        <td data-th="Subtotal" class="text-center"><p>{{$image->num *$image->products->prince }}</p></td>--}}

{{--                @endforeach--}}
{{--            @endforeach--}}
            @foreach($order_finish as $order_detailss)
                @foreach($order_detailss->order_details as $image)

                    <tr>
                        <td data-th="Subtotal" class="text-center">{{$i+=1}}</td>

                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hiddex-xs">
                                    {{--                                    @foreach($order_detailss->products->product_images as $image)--}}
                                    {{--                                        <img class="card-img-top img-responsive"  width="100" src="{{asset('ImageUploads/'.$image->image)}}" alt="..." />--}}

                                    {{--                                    @endforeach--}}
                                    @foreach($image->products->product_images as $image3)

                                        <img class="card-img-top img-responsive"  src="{{asset('ImageUploads/'.$image3->image)}}">
                                    @endforeach
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Sản phẩm {{$i}} </h4>
                                    <p>{{$image->products->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$image->products->prince}} đ</td>
                        <td data-th="Subtotal" class="text-center"><p>{{$image->num}}</p></td>
                        <td data-th="Subtotal" class="text-center"><p>{{$image->num *$image->products->prince }}</p></td>

                @endforeach
            @endforeach

            </tbody>
        @endif



        <tfoot>

        <tr>
            <td>
                <button onclick="history.back()">Go Back</button>
            </td>
            <td colspan="2" class="hidden-xs"> </td>

        </tr>
        </tfoot>
    </table>
</div>


</body>

</html>
