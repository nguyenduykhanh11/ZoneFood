<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Loại Sản phẩm của ZoneFood</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <style>
    .pagination svg {
        width: 15px;
        height: 15px;
    }

    .pagination p {
        padding-top: 20px;
    }

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
                    <li>
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
                    <li class="nav-item active">
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
            <div style="overflow-x: auto; overflow-y: visible;">
                <a href="/Master-AddCategory" class="btn btn-success">Thêm Loại Sản Phẩm Mới</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh loại sản phẩm</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Categorys as $Category)
                        <tr>
                            <td>{{$Category->id}}</td>
                            <td>
                                <img src="{{ asset('ImageUploads/'.$Category->image) }}" width="100px">
                            </td>
                            <td>{{$Category->name}}</td>
                            <td>{{$Category->created_at}}</td>
                            <td>
                                <a href="Master-DeleCategory/{{$Category->id}}" onclick="return remove(this);"
                                    value="{{$Category->id}}" name="{{$Category->name}}" class="btn"
                                    style="color:red; background-color: #CCCCFF;">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="Master-EditCategory/{{$Category->id}}" class="btn"
                                    style="color:green; background-color: #CCCCFF;">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$Categorys->links()}}
                </div>
            </div>
        </div>
    </div>

</body>
<script>
function remove(x) {
    var ans = confirm("Bạn có muốn xóa " + x.name + " ?");
    if (ans == true) return true;
    return false;
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

@if(session('message') == "xoa cate")
<script type="text/javascript">
$(document).ready(function() {
    demo.ShowMasterDeleteCategory();
});
</script>
@endif

</html>