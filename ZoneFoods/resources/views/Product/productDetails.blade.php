<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{asset('css/shop.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chitietsp.js') }}" defer></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

</head>

<body>
    @foreach($productt as $product)
    <!-- <button onclick="history.back()">Go Back</button> -->
    <div class="card-wrapper" style="border-style: inset;">

        <div class="card">

            <!-- card left -->
            @foreach($product->product_images as $image)
            <div class="product-imgs">
                <div id="errorr-{{$product->id}}"></div>
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="{{ asset('ImageUploads/'.$image->image) }} " alt="shoe image">
                        <img src="{{ asset('ImageUploads/'.$image->image2) }} " alt="shoe image">
                        <img src="{{ asset('ImageUploads/'.$image->image) }} " alt="shoe image">
                        <img src="{{ asset('ImageUploads/'.$image->image2) }} " alt="shoe image">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="{{ asset('ImageUploads/'.$image->image) }}" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="{{ asset('ImageUploads/'.$image->image2) }}" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="{{ asset('ImageUploads/'.$image->image) }}" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="{{ asset('ImageUploads/'.$image->image2) }}" alt="shoe image">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title">{{$product->name}}</h2>
                <a href="#" class="product-link">ngon chết bỏ</a>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                </div>

                <div class="product-price">
                    <p class="last-price">Old Price: <span>{{$product->discount}} $</span></p>
                    <p class="new-price">New Price: <span id="hiden-{{$product->id}}">{{$product->prince}} $</span></p>
                </div>

                <div class="product-detail">
                    <h2>Mô tả về món ăn </h2>
                    <p>{{$product->description}}</p>

                    <ul>
                        <li>Available: <span>in stock</span></li>
                        <li>Category: <span>Ăn để no</span></li>
                        <li>Shipping Fee: <span>Free</span></li>
                    </ul>
                </div>
                <div>
                    <h5>Chọn số lượng: </h5>
                    <div style="display: flex;">
                        <button class="btn btn-light tru" id="tru" style="border:1px solid #dce0e0;"
                            onclick="changeAdd({{$product->id}},-1)">-</button>
                        <input type="number" id="num-{{$product->id}}" id="num" class="form-control" step="1" value="1"
                            style="max-width: 60px;border:1px solid #dce0e0;" onchange="loiam({{$product->id}})">
                        <button class="btn btn-light cong" id="cong" style="border:1px solid #dce0e0;"
                            onclick="changeAdd({{$product->id}},1)">+</button>
                    </div>
                </div>
                <h4 class="price">tổng tiền:<span id="tinhtien-{{$product->id}}" step="1"> {{($product->prince)}}</span>
                    $</h4>

                <div class="purchase-info">
                    <button type="button" class="btn" onclick="btnProductDetails({{($product->id)}})">
                        Add to Cart <i class="fas fa-shopping-cart"></i>
                    </button>

                    <a href="{{route('cart.productCart')}}">
                        <button type="button" class="btn">Cart</button>
                    </a>

                </div>


            </div>
        </div>
    </div>
    @endforeach


    @include('shop')
    @include('footer')

</body>
<script>
function changeAdd(id, congtru1) {
    num = parseInt($('#num-' + id).val())
    moneycodinh = parseInt($('#hiden-' + id).html());
    num += congtru1
    if (num < 1) num = 1;
    a = num
    kq = a * moneycodinh;
    $('#num-' + id).val(num);
    $('#tinhtien-' + id).html(kq);
    money = parseInt($('#tinhtien-' + id).html());
    console.log(id, num, money, moneycodinh);

}

function loiam(id) {
    $('#num-' + id).val(Math.abs($('#num-' + id).val()))
}




function btnProductDetails(id) {
    console.log(id);
    var _csrf = '{{csrf_token()}}';
    var _addProductUrl = '{{route("ajax.actionAddProduct")}}';
    var num = parseInt($('#num-' + id).val())

    var money = parseInt($('#tinhtien-' + id).html());



    console.log(id, num, money, _addProductUrl, _csrf);

    $.ajax({
        url: _addProductUrl,
        type: 'POST',
        data: {
            id: id,
            num: num,
            prince: money,
            _token: _csrf
        },

        success: function(request) {
            if (request.num) {
                let _html_error = '<div class="alert alert-danger"><li style="font-weight: bold">';
                localStorage.setItem(num, request.num)
                _html_error += (request.num);
                _html_error += '</li></div>';
                $('#errorr-' + id).html(_html_error);
                $('#num-' + id).val('1');;

                //location.reload();
                // document.getElementById("form-add-product").style.display= 'None';

            }

        }
    });
}
</script>

</html>