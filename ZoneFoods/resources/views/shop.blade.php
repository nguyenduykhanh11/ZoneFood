<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/shop.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css') }}" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
</head>
<style>
.section-title {
    margin-bottom: 50px;
    color: #00b506;
    background-image: ;
}
</style>

<body>



    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container" style="    background-color: #f5f7f5;border-radius: 40px;border-style: dotted;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured__controls" style="margin-top: 50px">
                        <div class="section-title row">
                            <img class="col-sm-3 rounded-circle"
                                src="{{asset('ImageUploads/'.$store_image->storeimage)}}" alt="">
                            <h2 class="col"
                                style="text-align: center;position: absolute;top: 40%;transform: translateY(-50%);font-weight: 800;">
                                {{($product->product_store->name)}}</h2>
                        </div>
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($productt_category as $productt_category)
                            <li data-filter=".product-{{$productt_category->id}}">{{$productt_category->name}}</li>

                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($product_all as $product_all)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges product-{{($product_all->product_category_id)}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-1.jpg">
                            @foreach($product_all->product_images as $product_alll)
                            <img src="{{ asset('ImageUploads/'.$product_alll->image) }}" alt="">
                            @endforeach
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <a href="{{route('Product.productDetails',['product'=>$product_all->id])}}">
                                        <i class="fa fa-retweet"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="btn-add-product" id="btn-add-product"
                                        onclick="btnaddtocart({{$product_all->id}})">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product_all->name}}</a></h6>
                            <h5 id="tinhtien2-{{$product_all->id}}">{{$product_all->prince}}$</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    {{--    <section class="latest-product spad">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="latest-product__text">--}}
    {{--                        <h4>Latest Products</h4>--}}
    {{--                        <div class="latest-product__slider owl-carousel">--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="latest-product__text">--}}
    {{--                        <h4>Top Rated Products</h4>--}}
    {{--                        <div class="latest-product__slider owl-carousel">--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="latest-product__text">--}}
    {{--                        <h4>Review Products</h4>--}}
    {{--                        <div class="latest-product__slider owl-carousel">--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="latest-prdouct__slider__item">--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-1.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-2.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                                <a href="#" class="latest-product__item">--}}
    {{--                                    <div class="latest-product__item__pic">--}}
    {{--                                        <img src="img/latest-product/lp-3.jpg" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="latest-product__item__text">--}}
    {{--                                        <h6>Crab Pool Security</h6>--}}
    {{--                                        <span>$30.00</span>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{--    <section class="from-blog spad">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12">--}}
    {{--                    <div class="section-title from-blog__title">--}}
    {{--                        <h2>From The Blog</h2>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-4 col-md-4 col-sm-6">--}}
    {{--                    <div class="blog__item">--}}
    {{--                        <div class="blog__item__pic">--}}
    {{--                            <img src="img/blog/blog-1.jpg" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="blog__item__text">--}}
    {{--                            <ul>--}}
    {{--                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>--}}
    {{--                                <li><i class="fa fa-comment-o"></i> 5</li>--}}
    {{--                            </ul>--}}
    {{--                            <h5><a href="#">Cooking tips make cooking simple</a></h5>--}}
    {{--                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-md-4 col-sm-6">--}}
    {{--                    <div class="blog__item">--}}
    {{--                        <div class="blog__item__pic">--}}
    {{--                            <img src="img/blog/blog-2.jpg" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="blog__item__text">--}}
    {{--                            <ul>--}}
    {{--                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>--}}
    {{--                                <li><i class="fa fa-comment-o"></i> 5</li>--}}
    {{--                            </ul>--}}
    {{--                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>--}}
    {{--                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-4 col-md-4 col-sm-6">--}}
    {{--                    <div class="blog__item">--}}
    {{--                        <div class="blog__item__pic">--}}
    {{--                            <img src="img/blog/blog-3.jpg" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="blog__item__text">--}}
    {{--                            <ul>--}}
    {{--                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>--}}
    {{--                                <li><i class="fa fa-comment-o"></i> 5</li>--}}
    {{--                            </ul>--}}
    {{--                            <h5><a href="#">Visit the clean farm in the US</a></h5>--}}
    {{--                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Blog Section End -->





    <script src="{{asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{asset('js/jquery.slicknav.js') }}" defer></script>
    <script src="{{asset('js/jquery.nice-select.min.js') }}" defer></script>
    <script src="{{asset('js/mixitup.min.js') }}" defer></script>
    <script src="{{asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{asset('js/main.js') }}" defer></script>



</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function btnaddtocart(id) {
    var _csrf = '{{csrf_token()}}';
    var _addProductUrl = '{{route("ajax.actionAddProduct")}}';
    var num = 1;
    var money = parseInt($('#tinhtien2-' + id).html());


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
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thêm giỏ hàng thành công',
                    showConfirmButton: false,
                    timer: 1500
                })

            }

        }
    });
}
</script>

</html>