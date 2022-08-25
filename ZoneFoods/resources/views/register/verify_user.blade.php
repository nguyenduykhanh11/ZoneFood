<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/Login_style.css') }}">

</head>
<video id="content-heading__video" playsinline="" muted="" autoplay="" loop="">
    <source src="{{ asset('images/loginbg.mp4') }}" type="video/mp4">

</video>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">ZoneFoods</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="/mail_verify_register" method="GET" name="loginForm" class="signin-form">
                            <div class="form-group">
                                <input type="Email" class="form-control" placeholder="Email của bạn"
                                    value="<?php echo $_SESSION['new'][1] ?>" name="mail_name"
                                    autocomplete="new-Username" style="background-color: black;" readonly="true"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Gửi Mã</button>
                            </div>
                            @csrf
                        </form>
                        <p class="w-100 text-center">&mdash; Hoặc sử dụng &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="/register_verify_sms_view" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span>Số điện thoại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/Login_jquery.min.js"></script>
    <script src="js/Login_popper.js"></script>
    <script src="js/Login_bootstrap.min.js"></script>
    <script src="js/Login_main.js"></script>
    <script>
    document.loginForm.email.focus();
    </script>
</body>

</html>
