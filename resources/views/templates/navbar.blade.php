<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color:#A29487;">
    <div class="container" style="color:white;">
        <img src="/assets/images/Jupiter.png" width="70" height="70">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText" style="left:50px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" aria-current="page" href="/" onclick="setUrl(event)">Home</a>
                </li> 
                @if (Auth::guard('web')->check())

                    @if (Auth::guard('web')->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link active" style="color:white;" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    @endif

                @endif
                <li class="nav-item">
                    @if (Auth::guard('web')->check())
                        <a class="nav-link active" style="color:white;" href="{{route('service-view')}}">Book</a>
                    @else
                        <a class="nav-link active" style="cursor: pointer; color:white;" data-bs-toggle="modal" data-bs-target="#signIn">Book</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" href="#ourService">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" href="#ourArtist">Hair Artist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" href="#testimonial">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" href="#aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" href="#footer">Contact Us</a>
                </li>
            </ul>
            @if (Auth::guard('web')->check())
            <div class="dropdown" style="right:100px;">
            <i class="fa fa-user"></i>
                <span class="dropdown-content">
                    <a class="btn btn" data-bs-toggle="modal" data-bs-target="#profile" style="color:#402522">Profile</a>
                    <a href="{{ route('logic-logout') }}" class="btn btn" data-bs-toggle="modal" data-bs-target="#profile" style="color:#402522">Logout </a>
                    <!-- <button class="btn btn-sign-in" data-bs-toggle="modal" data-bs-target="#profile">Profile</button> -->
                    <!-- <img src="
                        @if (Auth::guard('web')->user()->image !== null)
                            {{asset(Auth::guard('web')->user()->image)}}
                        @else
                            /assets/images/member-1.png
                        @endif
                    " alt="" width="60px"> -->
                </span>
            @else
            <div class="dropdown" style="right:60px;">
            <i class="fa fa-user"></i>
                <!-- <button class="dropbtn">Dropdown</button> -->
                    <div class="dropdown-content">
                        <a class="btn btn" data-bs-toggle="modal" data-bs-target="#signUp" style="color:#402522">Sign Up</a>
                        <a class="btn btn" data-bs-toggle="modal" data-bs-target="#signIn" style="color:#402522">Sign In</a>
                    </div>
                    </div>
                <!-- <span class="navbar-text">
                    <button class="btn btn-sign-up" data-bs-toggle="modal" data-bs-target="#signUp">Sign Up</button>
                    <button class="btn btn-sign-in" data-bs-toggle="modal" data-bs-target="#signIn">Sign In</button>
                </span> -->
            @endif

        </div>
    </div>
</nav>
