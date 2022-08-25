<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="shoes_images/comga_1.jpg" alt="shoe image">
                        <img src="shoes_images/comga_2.jpg" alt="shoe image">
                        <img src="shoes_images/comga_3.jpg" alt="shoe image">
                        <img src="shoes_images/comga_4.jpg" alt="shoe image">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="shoes_images/comga_1.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="shoes_images/comga_2.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="shoes_images/comga_3.jpg" alt="shoe image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="shoes_images/comga_4.jpg" alt="shoe image">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title">Cơm Gà Mê Luôn</h2>
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
                    <p class="last-price">Old Price: <span>$257.00</span></p>
                    <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
                </div>

                <div class="product-detail">
                    <h2>about this item: </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur
                        placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius.
                        Dignissimos, labore suscipit. Unde.</p>
                    <ul>
                        <li>Available: <span>in stock</span></li>
                        <li>Category: <span>Ăn để no</span></li>
                        <li>Shipping Fee: <span>Free</span></li>
                    </ul>
                </div>

                <div class="purchase-info">
                    <input type="number" min="0" value="1">
                    <button type="button" class="btn">
                        Add to Cart <i class="fas fa-shopping-cart"></i>
                    </button>
                    <button type="button" class="btn">Compare</button>
                </div>


            </div>
        </div>
    </div>
    @include('shop')
    @include('footer')
</body>
</html>
