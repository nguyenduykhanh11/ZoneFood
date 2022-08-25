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
                    <li class="nav-item active">
                        <a class="nav-link" href="/MasterHome">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Thống Kê</p>
                        </a>
                    </li>
                    <li>
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
            <div class="content">
                <div class="container-fluid">
                    <h3>Tỷ lệ người dùng</h3>
                    <div class="col-md-5" style="margin-bottom: 50px">
                        <canvas id="analyst-zonefood">
                        </canvas>
                    </div>
                    <input type="hidden" id="Master" value="{{$Master}}">
                    <input type="hidden" id="Store" value="{{$Store}}">
                    <input type="hidden" id="User" value="{{$User}}">
                    <h3>Thông số nền tảng</h3>
                    <div style="padding: 10px;">
                        <div class="card text-white bg-primary mb-3"
                            style="max-width: 18rem; width: 18rem; float: left;margin-right: 10px;">
                            <div class="card-header" style="color: black; text-align: center;">Số lượng sản phẩm
                            </div>
                            <div class="card-body">
                                <h1 class="card-text" style="text-align: center;">{{$countProduct}}</h1>
                            </div>
                        </div>
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem; width: 18rem;">
                            <div class="card-header" style="color: black;text-align: center;">Tổng số lượng người dùng
                            </div>
                            <div class="card-body">
                                <h1 class="card-text" style="text-align: center;">{{$countUser}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var ctx = document.getElementById("analyst-zonefood").getContext('2d');
var Master = document.getElementById("Master").value;
var User = document.getElementById("User").value;
var Store = document.getElementById("Store").value;
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Chủ nền tảng", "Cửa hàng", "Khách hàng"],
        datasets: [{
            data: [Master, Store, User],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }],
    },

});
</script>
<script>
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
<script type="text/javascript">
$(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.showNotification();

});
</script>

</html>