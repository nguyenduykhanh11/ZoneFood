<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trang đặt hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</head>

<body>
    <!-- Navbar -->

    <!-- Navbar -->

    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">

            <!-- Heading -->
            <h2 class="my-5 h2 text-center">Checkout form</h2>

            <!--Grid row-->

            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <!--Card-->
                    <div class="card">
                        <!--Card content-->

                        <div class="card-body">
                            <!--fullName-->
                            <div class="md-form mb-5">
                                <input type="text" id="fullName" class="form-control" value="{{$user->name}}"
                                    required="true" placeholder="Họ và tên(*)">
                                <label for="email" class="">Họ và tên</label>
                            </div>

                            <!--email-->
                            <div class="md-form mb-5">
                                <input type="email" id="email" value="{{$user->email}}" class="form-control"
                                    required="true" placeholder="youremail@example.com">
                                <label for="email" class="">Email</label>
                            </div>

                            <!--address-->
                            <div class="md-form mb-5">
                                <input type="text" id="address" class="form-control" value="{{$user->adress}}"
                                    required="true"
                                    placeholder="34 Dương Thưởng-Hòa Cường-Hòa Cường Bắc-Hải Châu-Đà Nẵng">
                                <label for="address" class="">Địa chỉ</label>
                            </div>

                            <!--address-2-->
                            <div class="md-form mb-5">
                                <input type="text" id="phone" class="form-control" value="{{$user->phoneNumber}}"
                                    required="true" placeholder="Số điện thoại">
                                <label for="address-2" class="">Số điện thoại</label>
                            </div>

                            <!--Grid row-->

                            <button class="btn btn-primary btn-lg btn-block btn-checkOut" type="submit">Đặt
                                hàng</button>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng của bạn</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>

                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                        @foreach($order as $orderCart)
                        <input type="hidden" value="{{$i+=1}}">
                        <input type="hiden" id="store_idd" value="{{$orderCart->store_id}}">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Tên món {{$i}}</h6>
                                <small class="text-muted">{{$orderCart->product_id->name}}</small>
                            </div>
                            <span class="text-muted">{{$orderCart->prince}}</span>
                        </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng tiền (VND)</span>
                            <strong>{{$total}} đ</strong>
                        </li>
                    </ul>
                </div>
                <button onclick="history.back()">Go Back</button>
            </div>

            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var _csrf = '{{csrf_token()}}';
$('.btn-checkOut').click(function(ev) {
    ev.preventDefault();

    var _CheckOut = '{{route('
    order.formCheckOut ')}}';

    var store_id = $('#store_idd').val();
    var fullname = $('#fullName').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var phone = $('#phone').val();
    console.log(store_id, fullname, email, address, phone);
    $.ajax({
        url: _CheckOut,
        type: 'POST',
        data: {
            store_id: store_id,
            email: email,
            fullname: fullname,
            address: address,
            phone: phone,
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
                    footer: '<a href="{{route('
                    home ')}}">Đến xem sản phẩm?</a>'
                })
            }
        }
    });

});
</script>

</html>