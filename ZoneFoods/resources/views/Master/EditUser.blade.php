<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ZONEFOOD Master</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/css/demo.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
    @media(max-width: 500px) {
        #hide {
            display: none;
        }
    }

    body {
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" id="hide" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/MasterHome" class="simple-text">
                        ZoneFood Master
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="/MasterHome">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Thống Kê</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/AllUser">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Tài Khoản</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="/AllFood">
                            <i class="nc-icon nc-notes"></i>
                            <p>Các sản phẩm</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="/AllCategory">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Các loại sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="/">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Trang Chủ</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ url()->previous() }}" class="nav-link">
                                <i class="nc-icon nc-stre-left"></i>
                            </a>
                        </li>
                    </ul>
                    <button onclick="show();" class="navbar-toggler navbar-toggler-right" type="button"
                        data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="no-icon">Tài khoản</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/logOut">Đăng Xuất</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div>
                <div class="container-xl px-4 mt-4">
                    <!-- Account page navigation-->
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Ảnh Đại Diện</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">Vui lòng chọn ảnh không quá 2MB</div>
                                    <!-- Profile picture upload button-->
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Hồ sơ cá nhân</div>
                                <div class="card-body">
                                    <form action="/Master-EditUserDone/{{$User->id}}" onsubmit="return question();"
                                        method="POST">
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1">Họ và tên</label>
                                            <input class="form-control" name="name" type="text"
                                                placeholder="Nhập họ tên của bạn..." value="{{$User->name}}" required>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control" type="Email" name="email"
                                                    placeholder="Nhập vào Email của bạn..." value="{{$User->email}}"
                                                    required>
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1">Mật khẩu</label>
                                                <input class="form-control" type="text" name="password"
                                                    placeholder="Nhập vào mật khẩu..." value="{{$User->password}}"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1">Địa chỉ</label>
                                            <input class="form-control" type="text" name="address"
                                                placeholder="Nhập địa chỉ của bạn..." value="{{$User->adress}}"
                                                required>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (phone number)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1">Số điện thoại</label>
                                                <input class="form-control" name="phoneNumber" type="tel"
                                                    placeholder="Nhập số điện thoại của bạn..."
                                                    value="{{$User->phoneNumber}}" required>
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1">Ngày tạo tài khoản</label>
                                                <input class="form-control" type="text" name="dateCreate"
                                                    value="{{$User->created_at}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form auth-->
                                            <div class="col-md-6">
                                                <label class="small mb-1">Chức vụ</label>
                                                <select class="form-control" style="height: calc(2.25rem + 15px);"
                                                    name="auth">

                                                    <option style="color: black;" value="0" @if($User->auth == 0)
                                                        {{"selected"}}
                                                        @endif
                                                        >
                                                        Khách Hàng
                                                    </option>
                                                    <option style="color: blue;" value="1" @if($User->auth == 1)
                                                        {{"selected"}}
                                                        @endif
                                                        >
                                                        Cửa Hàng
                                                    </option>
                                                    <option style="color: red;" value="2" @if($User->auth == 2)
                                                        {{"selected"}}
                                                        @endif
                                                        >
                                                        Chủ Nền Tảng
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function question() {
    var ans = confirm("bạn muốn sửa thông tin ?");
    return ans
}

function show() {
    var x = document.getElementById('hide');
    if (x.style.display != "block") {
        x.style.display = "block";
    } else x.style.display = "none";
}
</script>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
@if(session('message') == "edit user")
<script type="text/javascript">
$(document).ready(function() {
    demo.ShowMasterEditUser();
});
</script>
@endif

</html>