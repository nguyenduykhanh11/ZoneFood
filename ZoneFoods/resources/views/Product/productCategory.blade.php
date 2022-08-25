<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{asset('css/slide.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="{{ asset('js/info.js') }}" defer></script>


    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css" type="text/css">
    <link href="{{asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/hover.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    {{--    <link href="{{asset('css/scroll.css') }}" rel="stylesheet">--}}
    {{--    <script src="{{ asset('js/skrollr.js') }}" defer></script>--}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.js"></script>
</head>

<body>


    @foreach ($product_Category as $product)
    <div class="modal" id="myModal-{{$product->id}}">
        <div class="modal-dialog" id="form-add-product">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm vào giỏ hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" class="x-reload"
                        id="x-reload">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="errorr-{{$product->id}}"></div>

                    <form action="" method="POST" role="form">
                        <div class="card h-100">
                            <!-- Product image-->
                            @foreach($product->product_images as $image)
                            <img class="card-img-top" src="{{asset('ImageUploads/'.$image->image)}}" alt="..." />
                            @endforeach

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>

                                    <!-- Product price-->
                                    <input type="hidden" id="hiden-{{$product->id}}" value="{{($product->prince)}}">
                                    <span id="tinhtien-{{$product->id}}" step="1"> {{($product->prince)}}
                                        đ</span>
                                    <!-- Product price-->

                                </div>
                            </div>
                            <!-- Product actions-->
                        </div>

                        <div>
                            <h5>Chọn số lượng: </h5>
                            <div style="display: flex;">
                                <button class="btn btn-light tru" id="tru" style="border:1px solid #dce0e0;"
                                    onclick="changeAdd({{$product->id}},-1)">-</button>
                                <input type="number" id="num-{{$product->id}}" id="num" class="form-control" step="1"
                                    value="1" style="max-width: 60px;border:1px solid #dce0e0;"
                                    onchange="loiam({{$product->id}})">
                                <button class="btn btn-light cong" id="cong" style="border:1px solid #dce0e0;"
                                    onclick="changeAdd({{$product->id}},1)">+</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block"
                            onclick="btnaddProduct({{$product->id}})">Thêm vào giỏ hàng</button>

                    </form>

                </div>

            </div>
        </div>
        <!--END add GIỎ HANG -->
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="product-grid3">
            <div class="product-image3">
                <a href="{{route('Product.productDetails',['product'=>$product->id])}}">
                    @foreach($product->product_images as $image)
                    <img class="pic-1" src="{{asset('ImageUploads/'.$image->image)}}">
                    <img class="pic-2" src="{{asset('ImageUploads/'.$image->image2)}}">
                    @endforeach
                </a>
                <ul class="social">
                    <li>
                        <a class="btn-add-product" id="btn-add-product" data-toggle="modal"
                            data-target="#myModal-{{$product->id}}" data-id="{{$product->id}}">
                            <i class="fa fa-shopping-bag"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('Product.productDetails',['product'=>$product->id])}}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>

                <span class="product-new-label">New</span>
            </div>
            <div class="product-content">
                <h3 class="title"><a
                        href="{{route('Product.productDetails',['product'=>$product->id])}}">{{$product->name}}</a>
                </h3>
                <h3 class="title"><a
                        href="{{route('Product.productDetails',['product'=>$product->id])}}">{{$product->product_category->name}}</a>
                </h3>
                <div class="price">
                    ${{$product->discount}}
                    <span>${{$product->prince}}</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html>