<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký cửa hàng</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="css/FontRegisterStore.css"> <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="css/StyleRegisterStore.css" type="text/css" media="all" /> <!-- Style-CSS -->
    <!-- //css files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>
    <!--header-->
    <div class="header-w3l">
        <h1>Đăng ký cửa hàng</h1>
    </div>
    <!--//header-->
    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->
        <div class="wthree-form">
            <h2>Nhập thông tin cửa hàng</h2>
            <form action="/reStorePC" method="POST" enctype="multipart/form-data">
                <div class="form-sub-w3">
                    <input type="text" name="storeName" placeholder="Tên cửa hàng " required="" />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input type="text" name="StoreAddress" value="{{$user->adress}}" placeholder="Địa chỉ cửa hàng "
                        required="" readonly />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input type="text" name="StoreEmail" value="{{$user->email}}" placeholder="Email " required=""
                        readonly />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input type="text" name="StorePhone" value="{{$user->phoneNumber}}" placeholder="Số điện thoại "
                        required="" readonly />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <h2>Ảnh cửa hàng</h2>
                <div class="submit-agileits">
                    <input type="file" name="storeImage" />
                </div>
                <div class="clear"></div>
                <div class="submit-agileits">
                    <input type="submit" value="Đăng Ký">
                </div>
                @csrf
            </form>

        </div>
        <!--//form-ends-here-->

    </div>
    <!--//main-->
</body>

</html>