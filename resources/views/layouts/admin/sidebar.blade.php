<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 position-fixed" style="background-color: #A29487;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('adminorder')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">My Order</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">Item</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">Item</span></a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="{{route('adminservice')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">My Services</span></a>
                    </li>
                    <li>
                        <a href="{{route('adminbarber')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Stylists</span> </a>
                    </li><br>
                    <li>
                        <a href="{{route('logic-logout')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Logout</span> </a>
                    </li>
                </ul>
                <hr>
                <!-- <div class="dropdown pb-5">
                    <a href="{{ route('logic-logout') }}" class="nav-link px-0 align-middle">
                        <span class="d-none d-sm-inline mx-1" style="color:white;">Logout</span>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="col py-3" style="margin-left: 16%;"><br><br>
            <div class="container mt-5">
                <div class="container">
                    <div class="container">
                        <div class="container">
                            <div class="shadow p-3 mb-5 bg-white rounded-3">
