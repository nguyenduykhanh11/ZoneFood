<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ZONEFOOD</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!-- Bootstrap icons-->
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.js"></script>

    <style>
    .modal {
        max-width: 150%;
    }

    body {
        font-size: 1.6rem !important;
    }

    /* page-top */
    .scroll-to-top {
        font-size: 50px;
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        display: inline;
        width: 7.75rem;
        height: 5.75rem;
        text-align: center;
        line-height: 46px;
    }

    .scroll-to-top:hover {
        color: #00ff1575;
    }
    </style>


</head>

<body>
    <div id="preloader"></div>
    <!-- Header-->

    @include('header')
    <section class="banner"></section>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classlist.toggle("sticky", window.scrollY > 0);
    })
    </script>


    <!--  slide -->
    <div class="slider-container" id="home">
        <div class="slider-control left inactive"></div>
        <div class="slider-control right"></div>
        <ul class="slider-pagi"></ul>
        <div class="slider">
            <div class="slide slide-0 active">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Bánh Mỳ Việt Nam</h2>
                        <p class="slide__text-desc">Một loại thịt xiên nướng ăn kèm với bánh mì được người Việt rất ưa
                            chuộng có tên gọi là Bánh Mỳ Heo Quay. Không chỉ được người dân bản địa dùng phổ biến mà
                            món ăn nổi tiếng này cũng được lòng rất nhiều khách du lịch.</p>
                        <a class="slide__text-link">Đặt mua ngay!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-1 ">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Gua bao Đài Loan</h2>
                        <p class="slide__text-desc">Du lịch đến Đài Loan có lẽ bạn đã được thưởng thức món đậu phụ thối,
                            món mì bò. Nhưng Gua bao có lẽ còn được ít người biết đến hơn. Dù vậy, nếu đã được một lần
                            thưởng thức món này thì chắc chắn sẽ có những lần tiếp theo.</p>
                        <a class="slide__text-link">Đặt mua ngay!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-2">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Currywurst Đức</h2>
                        <p class="slide__text-desc">Currywurst là sự kết hợp của khoai tây chiên, xúc xích cắt lát, sốt
                            cà ri. Món ăn vặt nổi tiếng này được người dân Đức thưởng thức hàng ngày. Du khách các nước
                            đến Đức cũng rất ưa chuộng Currywurst.</p>
                        <a class="slide__text-link">Đặt mua ngay!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-3">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Pizza của Mỹ</h2>
                        <p class="slide__text-desc">Pizza là một món ăn nổi tiếng có nguồn gốc từ Ý, nhưng nếu du lịch
                            đến Mỹ, bạn cũng có thể thưởng thức món bánh này được chế biến theo công thức độc đáo của
                            người Mỹ.</p>
                        <a class="slide__text-link">Đặt mua ngay!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-4">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Pizza của Mỹ</h2>
                        <p class="slide__text-desc">Pizza là một món ăn nổi tiếng có nguồn gốc từ Ý, nhưng nếu du lịch
                            đến Mỹ, bạn cũng có thể thưởng thức món bánh này được chế biến theo công thức độc đáo của
                            người Mỹ.</p>
                        <a class="slide__text-link">Đặt mua ngay!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./scripts.js"></script>
    <!-- end slide -->
    <section class="ps-features pt-40 pb-20">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4" style="padding-left: 95px;">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class="bi-star"></i>
                            <h3>Cam Kết chính hãng</h3>
                            <p>100 % Authentic</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>Cam kết sản phẩm chính hãng từ Châu Âu, Châu Mỹ...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4" style="padding-left: 95px;">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class="bi-alarm"></i>
                            <h3>Giao hàng hỏa tốc</h3>
                            <p>Express delivery</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>SHIP hỏa tốc 1h nhận hàng trong nội thành HCM</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class="bi-headset"></i>
                            <h3>Hỗ trợ 24/24</h3>
                            <p>Supporting 24/24</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>Gọi ngay <a href=""></a> </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @if(session('error'))
    <h3 style="color: red;">{{session('error')}}</h3>
    @endif
    <div class="row" id="page-top">

        <div class="twelve columns">
            <h3 style="font-weight: 600;">Chọn Theo Thể Loại</h3>
            <ul class="ca-menu">
                @include('categoryShop')
            </ul>
        </div>
    </div>
    <!-- top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="bi bi-arrow-up-circle-fill"></i>
    </a>

    <div class="container">
        <h3 style="font-weight: 600;" class="h3">Đặt Mua Đi Chờ Chi</h3>

        <div class="infinity-scroll">
            <div class="row featured__filter">
                @foreach ($product_all as $product)
                <div class="modal" id="myModal-{{$product->id}}">
                    <div class="modal-dialog" id="form-add-product">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 style="font-size:25px;font-weight:600;" class="modal-title">Thêm vào giỏ hàng</h4>
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
                                        <img class="card-img-top" src="{{asset('ImageUploads/'.$image->image)}}"
                                            alt="..." />
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
                                                <input type="hidden" id="hiden-{{$product->id}}"
                                                    value="{{($product->prince)}}">
                                                <span id="tinhtien-{{$product->id}}" step="1"> {{($product->prince)}}
                                                    đ</span>
                                                <!-- Product price-->
                                                <h5>Chọn số lượng: </h5>

                                                <div
                                                    style="display: flex;flex-direction: row-reverse;position: relative;top: -40px;">
                                                    <button class="btn btn-light cong" id="cong"
                                                        style="border:1px solid #dce0e0;"
                                                        onclick="changeAdd({{$product->id}},1)">+</button>

                                                    <input type="number" id="num-{{$product->id}}" id="num"
                                                        class="form-control" step="1" value="1"
                                                        style="max-width: 60px;border:1px solid #dce0e0;"
                                                        onchange="loiam({{$product->id}})">
                                                    <button class="btn btn-light tru" id="tru"
                                                        style="border:1px solid #dce0e0;"
                                                        onclick="changeAdd({{$product->id}},-1)">-</button>
                                                </div>
                                                <button style="margin-top: -20px;" type="button"
                                                    class="btn btn-primary btn-block"
                                                    onclick="btnaddProduct({{$product->id}})">Thêm vào giỏ hàng</button>

                                            </div>
                                        </div>
                                        <!-- Product actions-->

                                    </div>



                                </form>

                            </div>

                        </div>
                    </div>
                    <!--END add GIỎ HANG -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mix product-{{($product->product_category_id)}}">
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
                            <h3 style="font-weight: bold; font-size: 15px;" class="title"><a
                                    href="{{route('Product.productDetails',['product'=>$product->id])}}">{{$product->name}}</a>
                            </h3>
                            <h3 class="title"><a
                                    href="{{route('Product.productDetails',['product'=>$product->id])}}">{{$product->product_category->name}}</a>
                            </h3>
                            <div class="price">
                                {{$product->discount}}đ
                                <span>{{$product->prince}}đ</span>
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
                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
    $('.pagination').hide();

    $(function() {
        $('.infinity-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/images/loader.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination .hidden a:last',
            contentSelector: 'div.infinity-scroll',
            callback: function() {
                // xóa thanh phân trang ra khỏi html mỗi khi load xong nội dung
                $('.pagination').remove();
            }
        });
    });
    </script>
    <script>
    function changeAdd(id, congtru1) {
        num = parseInt($('#num-' + id).val())
        moneycodinh = parseInt($('#hiden-' + id).val());
        num += congtru1
        if (num < 1) num = 1;
        a = num
        kq = a * moneycodinh;
        $('#num-' + id).val(num);
        $('#tinhtien-' + id).html(kq + ' đ');
        money = parseInt($('#tinhtien-' + id).html());
        console.log(id, num, money, moneycodinh);

    }

    function loiam(id) {
        $('#num-' + id).val(Math.abs($('#num-' + id).val()))
    }

    $(document).on('click', '.cong', function(ev) {

        ev.preventDefault();

    });
    $(document).on('click', '.tru', function(ev) {

        ev.preventDefault();

    });
    /* end Nut SO luong*/

    function btnaddProduct(id) {
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
                    $('#num-' + id).val('1');

                    //location.reload();
                    // document.getElementById("form-add-product").style.display= 'None';

                }

            }
        });
    }
    </script>


</body>

</html>