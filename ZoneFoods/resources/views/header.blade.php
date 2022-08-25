<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Zone</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/header.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}" defer></script>


</head>

<body>
    <header>
        <a href="/" class="logo">ZoneFoods</a>
        <ul>
            <li><a href="#home">Home</a></li>
            <div class="dropdown">
                <li><a class="nut_dropdown" href="">Khu Vực</a></li>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Đà Nẵng</a>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <a href="#">Hà Nội</a>
                    <a href="#">TP HCM</a>
                </div>
            </div>
            <li><a href="/blog">Blog</a></li>
            <div class="dropdown">
                @if($_SESSION['id'] == '')
                <li><a class="nut_dropdown dropdown-toggle bi-person-circle" href=""> Tài khoản</a>
                </li>
                <div class="dropdown-menu">
                    <a href="login_view">Đăng Nhập</a>
                    <a href="register_view">Đăng Ký</a>
                </div>
                @else
                <li><a class="nut_dropdown dropdown-toggle bi-person-circle" href="">
                        <?php echo $_SESSION['name']; ?></a></li>
                <div class="dropdown-menu">
                    @if($_SESSION['auth'] == 2)
                    <a class="dropdown-item" href="/MasterHome">Master ZoneFood</a>
                    @endif
                    @if($_SESSION['auth'] == 1)
                    <a class="dropdown-item" href="AdminStore">Admin Store</a>
                    @endif
                    <a class="dropdown-item" href="profile">Tài Khoản</a>
                    @if($_SESSION['auth'] == 0)
                    <a class="dropdown-item" href="resign_store">Đăng ký cửa hàng</a>
                    @endif
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <a href="logOut">Đăng xuất</a>
                </div>
                @endif
            </div>


            <a style="font-size: 35px;color: #47e505;border: 2px solid;border-radius: 15px;"
                class="bi bi-cart-check-fill" href="{{route('cart.productCart')}}"></a>



        </ul>
    </header>

</body>

</html>