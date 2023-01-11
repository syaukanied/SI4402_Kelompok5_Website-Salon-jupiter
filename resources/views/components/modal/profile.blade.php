<style>
    .btn-home {
        position: absolute;
    }

    .profile {
        width: 1200px;
        margin: auto;
        position: relative;
    }

    .profile .content {
        height: 100%;
    }

    .profile .registration-form {
        background-color: white;
        padding: 50px 52px;
    }

    .profile .registration-form .form-control,
    .profile .registration-form .form-select {
        border: 1px solid #7C7574;
        font-size: 20px;
        border-radius: 15px;
    }

    .profile .registration-form .form-label {
        font-weight: bold;
    }

    .profile .registration-form .btn-registration {
        background-color: #7C7574;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        width: 100%;
        font-size: 32px;
    }

    .profile .registration-form .btn-registration:hover {
        color: white;
    }

    .profile .profile-pic {
        margin-top: 30%;
    }

    .profile .profile-pic img {
        border: 10px solid white;
        border-radius: 50%
    }

    .profile .profile-pic .btn {
        position: absolute;
        bottom: 40px;
        right: 80px;
    }

</style>

<div class="modal fade" id="profile" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <img class="bg-gray" src="./assets/images/Head.svg" alt="">
                <div class="btn-home" data-bs-dismiss="modal" aria-label="Close">
                    <img style="cursor: pointer;" src="./assets/images/back-button2.png" width="50" height="40">
                </div>
                <div class="profile">
                    <div class="content row">
                        <div class="col-5 text-center">
                            <div class="profile-pic mb-4  position-relative">
                                <img class="rounded-circle" src="
                                    @if (Auth::guard('web')->user()->image !== null)
                                        {{asset(Auth::guard('web')->user()->image)}}
                                    @else
                                        /assets/images/member-1.jpg
                                    @endif

                                " alt="" width="300px">
                                <button class="btn btn-light">
                                    <label style="cursor: pointer" for="prop_pict"><i class="fas fa-edit"></i> Edit</label>
                                </button>
                                <div>
                                    <form id="profilePictForm" action="{{route('user.logic-update-profile-image-user')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control form-control-sm" id="prop_pict" name="image" type="file" accept=".png,.jpg.jpeg" hidden onchange="document.getElementById('profilePictForm').submit()">
                                    </form>
                                </div>
                            </div>
                            <div>
                                <a href="{{route('user.order-user-view')}}">
                                    <button class="btn btn-brown">MY BOOKING</button>
                                </a>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('logic-logout') }}">
                                    <button class="btn btn-danger rounded-pill">Logout <i class="fas fa-sign-out-alt"></i></button>
                                </a>
                            </div>
                        </div>
                        <div class="registration-form col-7">
                            <h1 class="text-center fw-bold">My Profile</h1>
                            <form action="{{ route('user.logic-update-profile-user') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ Auth::guard('web')->user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::guard('web')->user()->email }}" autocomplete="off" readonly disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">No Ponsel</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::guard('web')->user()->phone_number }}" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" aria-label="gender" required>
                                        <option selected disabled value="null">Gender</option>
                                        <option
                                            @if (Auth::guard('web')->user()->gender == 1)
                                                {{"selected"}}
                                            @endif
                                        value="1">Pria</option>
                                        <option
                                            @if (Auth::guard('web')->user()->gender == 2)
                                                {{"selected"}}
                                            @endif
                                        value="2">Wanita</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{ Auth::guard('web')->user()->address }}" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-registration">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
