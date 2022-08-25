<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký ZoneFood</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/Login_style.css')}}">
</head>

<body>

<video id="content-heading__video" playsinline="" muted="" autoplay="" loop="">
    <source src="{{ asset('images/loginbg.mp4') }}" type="video/mp4">

</video>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">ZoneFoods</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
            <!-- <h4 class="text-center" style="color: white;">
                        @if(session('error'))
                <Strong>{{session('error')}}</Strong>
                        @endif
                </h4> -->
                <form action="register_verify" style="text-align: center;" method="POST">

                    <input type="text" class="form-group form-control" placeholder="Họ và Tên" name="name"
                           autocomplete="new-Username" required>


                    <input type="email" class="form-group form-control" placeholder="Nhập Email" name="email"
                           autocomplete="new-Username" required>


                    <input type="text" class="form-group form-control" placeholder="Số điện thoại"
                           name="phoneNumber" autocomplete="new-Username" required>


                    <input type="text" class="form-group form-control" placeholder="Địa Chỉ" name="adress"
                           autocomplete="new-Username" required>

                    <input id="password-field" type="Password" class="form-group form-control"
                           placeholder="Nhập Mật Khẩu" name="Password" autocomplete="new-password" required>
{{--                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>--}}


                    <button type="submit" class="form-group form-control btn btn-primary submit px-3">Đăng
                        Ký</button>


                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="login_view" style="color: #fff">Đã có tài khoản</a>
                        </div>
                    </div>
                    @csrf
                </form>


            </div>
        </div>
    </div>
</div>

</body>

</html>
