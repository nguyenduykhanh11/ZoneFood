<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>



    <style>
    :root {



        --onyx: hsl(0, 0%, 25%);
        --azure: hsl(219, 77%, 60%);
        --white: hsl(0, 0%, 100%);
        --platinum: hsl(0, 0%, 91%);
        --gainsboro: hsl(0, 0%, 90%);
        --red-salsa: hsl(0, 77%, 60%);
        --dim-gray: hsl(0, 0%, 39%);
        --davys-gray: hsl(0, 0%, 30%);
        --spanish-gray: hsl(0, 0%, 62%);
        --quick-silver: hsl(0, 0%, 64%);

        /**
 * Typography
 */

        --fs-28: 28px;
        --fs-24: 24px;
        --fs-18: 18px;
        --fs-15: 15px;
        --fs-14: 14px;

        --fw-5: 500;
        --fw-6: 600;
        --fw-7: 700;

        /**
 * Others 
 */

        --px: 60px;
        --radius: 5px;

    }

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-family: 'Source Sans 3', sans-serif;
    }

    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control {
            width: 20%;
            display: inline !important;
        }

        .actions .btn {
            width: 36%;
            margin: 1.5em 0;
        }

        .actions .btn-info {
            float: left;
        }

        .actions .btn-danger {
            float: right;
        }

        table#cart thead {
            display: none;
        }

        table#cart tbody td {
            display: block;
            padding: .6rem;
            min-width: 320px;
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
            display: block;
        }

        table#cart tfoot td .btn {
            display: block;
        }
    }

    .heading {
        font-size: var(--fs-28);
        font-weight: var(--fw-6);
        color: var(--onyx);
        border-bottom: 1px solid var(--gainsboro);
        padding: 20px var(--px);
        gap: 30px;

    }

    a {
        color: var(--onyx);
        text-decoration: none !important;
    }

    .heading ion-icon {
        font-size: 40px;
    }
    </style>
    <title>Cart</title>

</head>

<body>

    <!-- <a href="{{route('cart.history')}}">Lịch sử đặt hàng</a> -->
    <div class="container">
        <h1 class="heading">
            <a href="/">
                <ion-icon name="home-outline"></ion-icon> ZoneCart
            </a>
        </h1>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên món</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            @if($_SESSION['id']!='')


            <tbody>
                @foreach($cart as $cart)

                <tr>

                    <input type="hidden" value="{{$i+=1}}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hiddex-xs">
                                @foreach($cart->product_id->product_images as $image)
                                <img class="card-img-top img-responsive" width="100"
                                    src="{{asset('ImageUploads/'.$image->image)}}" alt="..." />
                                @endforeach
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Sản phẩm {{$i}} </h4>
                                <input type="hidden" id="store-id" value="{{$cart->product_id->store_id}}">
                                <p>{{$cart->product_id->name}}</p>
                            </div>
                        </div>
                    </td>

                    <td data-th="Price" id="princecart-{{$cart->id}}">{{$cart->product_id->prince}} đ</td>
                    <td>
                        <div style="display: flex">
                            <button class="btn btn-light tru" id="btn-subNumCart" style="border:1px solid #dce0e0;"
                                onclick="numCart({{$cart->id}},-1)">-</button>
                            <input type="number" id="numcart-{{$cart->id}}" value="{{$cart->num}}" class="form-control"
                                style="width:80px; " onchange="onChangeNum({{$cart->id}})">
                            <button class="btn btn-light cong" id="btn-addNumCart" data-id="{{$cart->id}}"
                                style="border:1px solid #dce0e0;" onclick="numCart({{$cart->id}},1)">+</button>
                        </div>
                    </td>
                    {{--            <td data-th="Quantity"><input class="form-control text-center" value="{{$cart->num}}"
                    type="number">--}}
                    </td>
                    <td data-th="Subtotal" class="text-center" id="princecartnum-{{$cart->id}}">{{$cart->prince}} đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm btn-delete-product" onclick="deleteProduct({{$cart->id}})"><i
                                class="fa fa-edit">Xóa</i>
                        </button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                        </button>
                    </td>

                </tr>
                <p id="tientien"></p>
                @endforeach

            </tbody>
            @endif

            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Tổng 200.000 đ</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="history.back()">Go Back</button>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>

                    <td class="hidden-xs text-center"><strong>Tổng tiền <span id="sumMoney">{{$total}} đ</span></strong>
                    </td>
                    @if($_SESSION['id']!=''&& $total!=0)
                    <td><a href="{{route('order.checkOut')}}" class="btn btn-success btn-block">Thanh toán <i
                                class="fa fa-angle-right"></i></a>
                    </td>
                    @endif
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
    var _csrf = '{{csrf_token()}}';

    function numCart(id, congtru1) {
        var num = parseInt($('#numcart-' + id).val())
        prince = parseInt($('#princecart-' + id).html())
        num += congtru1;
        if (num < 1) num = 1;
        kq = prince * num;
        console.log(id, prince, kq);
        $('#numcart-' + id).val(num);
        $('#princecartnum-' + id).html(kq + ' đ');

        // phần xử lý ajax

        let num1 = parseInt($('#numcart-' + id).val());
        var _addProductUrl = '{{route("ajax.addNumCart")}}';

        let idd = id;
        console.log(idd, num1, kq, _csrf);
        $.ajax({
            url: _addProductUrl,
            type: 'POST',
            data: {

                id: idd,
                num: num1,
                prince: kq,
                _token: _csrf
            },
            success: function(request) {
                if (request.num) {
                    location.reload();
                }
            }
        });

    };

    // btn-Xóa-sản phẩm
    function deleteProduct(id) {

        console.log(id);
        var _addProductUrl = '{{route("ajax.deleteProductCart")}}';

        console.log(id, _csrf);
        $.ajax({
            url: _addProductUrl,
            type: 'POST',
            data: {

                id: id,
                _token: _csrf
            },
            success: function(request) {
                if (request.num) {
                    location.reload();
                }
            }
        });

    };

    function onChangeNum(id) {
        $('#numcart-' + id).val(Math.abs($('#numcart-' + id).val()))
    }
    </script>


</body>

</html>