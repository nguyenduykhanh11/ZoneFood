<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AdminStore">
        <div>
            <img src="{{asset('imgbg/Logo.jpg')}}" style="border-radius: 50%; width: 50px; margin-left: 10px;">
        </div>
        <div class="sidebar-brand-text mx-3">ZONEFOOD<sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="AdminStore">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống Kê</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản Lý Đơn</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Đơn Đặt:</h6>
                <a class="collapse-item" href="order_watting">Đơn đang chờ</a>
                <a class="collapse-item" href="order_done">Đơn đã bán</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="all_foods">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản Lý Sản Phẩm</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="blogs">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản Lý Bài Viết</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>ZoneAdmin</strong>
        </p>
        <a class="btn btn-success btn-sm" href="/">Trang user</a>
    </div>

</ul>
<!-- End of Sidebar -->