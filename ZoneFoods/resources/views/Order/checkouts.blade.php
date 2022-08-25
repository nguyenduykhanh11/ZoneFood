<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!--
    - custom css link
  -->
    <link href="{{asset('css/checkouts.css') }}" rel="stylesheet">


    <!--
    - google font link
  -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+3:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic"
        rel="stylesheet" />
</head>

<body>


    <!--
    - main container
  -->

    <main class="container">

        <h1 class="heading">
            <ion-icon name="cart-outline"></ion-icon> Zone CheckOut
        </h1>

        <div class="item-flex">


            <section class="checkout">

                <h2 class="section-heading">Phương thức thanh toán</h2>

                <div class="payment-form">

                    <div class="payment-method">

                        <button class="method selected">
                            <ion-icon name="logo-usd"></ion-icon>
                            <span>Khi Nhận Được Hàng</span>

                            <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                        </button>

                        <button class="method">
                            <ion-icon name="card"></ion-icon>

                            <span>Card/MoMo</span>

                            <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                        </button>

                    </div>

                    <form action="#">

                        <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">Họ và Tên Nhận Hàng</label>
                            <input type="text" id="fullname" value="{{$user->name}}" id="cardholder-name"
                                class="input-default">
                        </div>

                        <div class="card-number">
                            <label for="card-number" class="label-default">Số Điện Thoại</label>
                            <input type="text" id="phone" id="card-number" value="{{$user->phoneNumber}}"
                                class="input-default">
                        </div>
                        <div class="card-number">
                            <label for="card-email" class="label-default">Email</label>
                            <input type="email" id="email" id="card-email" value="{{$user->email}}"
                                class="input-default">
                        </div>
                        <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">Địa Chỉ</label>
                            <input type="text" id="address" id="address" value="{{$user->adress}}"
                                class="input-default">
                        </div>

                    </form>

                </div>

                <button class="btn btn-primary btn-checkOut">
                    <b>Thanh Toán</b><span>{{$total}}</span>đ
                </button>

            </section>


            <!--
        - cart section
      -->
            <section class="cart">

                <div class="cart-item-box">

                    <h2 class="section-heading">Đơn hàng của bạn</h2>
                    @foreach($order as $orderCart)
                    <input type="hiden" id="store_idd" value="{{$orderCart->store_id}}">
                    <div class="product-card">

                        <div class="card">

                            <div class="img-box">
                                @foreach($orderCart->product_id->product_images as $image)
                                <img src="{{asset('ImageUploads/'.$image->image)}}" alt="Green tomatoes" width="80px"
                                    class="product-img">
                                @endforeach

                            </div>

                            <div class="detail">

                                <h4 class="product-name">{{$orderCart->product_id->name}}</h4>

                                <div class="wrapper">

                                    <div class="product-qty">


                                        <span id="quantity">{{$orderCart->num}}</span>


                                    </div>

                                    <div class="price">
                                        <span id="price">{{$orderCart->prince}}</span>đ
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>
                    @endforeach



                    <div class="wrapper">

                        <div class="discount-token">

                            <label for="discount-token" class="label-default">Gift card/Discount code</label>

                            <div class="wrapper-flex">

                                <input type="text" name="discount-token" id="discount-token" readonly
                                    class="input-default">

                                <button class="btn btn-outline">Apply</button>

                            </div>

                        </div>

                        <div class="amount">

                            <div class="subtotal">
                                <span>Tổng số lượng</span> <span><span id="subtotal">{{$total_num}}</span></span>
                            </div>


                            <div class="total">
                                <span>Tổng Tiền</span> <span><span id="total">{{$total}}</span>đ</span>
                            </div>

                        </div>

                    </div>

            </section>

        </div>

    </main>





    <!--
    - custom js link
  -->
    <script src="{{asset('js/checkouts.js')}}"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var _csrf = '{{csrf_token()}}';
$('.btn-checkOut').click(function(ev) {
    Swal.fire({
        title: 'Đặt Hàng?',
        text: "Bạn chắc chắn muốn đặt hàng!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, đặt hàng!'
    }).then((result) => {
        if (result.isConfirmed) {
            ev.preventDefault();
            var _CheckOut = "{{route('order.formCheckOut')}}";
            var store_id = $('#store_idd').val();
            var email = $('#email').val();
            var fullname = $('#fullname').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            console.log(email, store_id, fullname, address, phone);

            $.ajax({
                url: _CheckOut,
                type: 'POST',
                data: {
                    store_id: store_id,
                    fullname: fullname,
                    address: address,
                    phone: phone,
                    email: email,
                    _token: _csrf

                },

                success: function(request) {
                    if (request.num) {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Đặt thành công',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(function() {
                            window.location.assign("/");
                        }, 1500);

                    } else if (request.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thành công',
                            text: 'Không tìm thấy sản phẩm bạn muốn đặt',
                            footer: '<a href="{{route('home')}}">Đến xem sản phẩm?</a>'
                        })
                    }
                }
            });
        }
    })


});
</script>

</html>