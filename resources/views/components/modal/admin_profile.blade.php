<style>
    .btn-home {
        position: absolute;
        z-index: 99999;
    }

    .profile {
        width: 1200px;
        margin: auto;
        position: relative;
    }

    .profile .content {
        height: 100%;
    }

    .profile .profile-form {
        background-color: white;
        padding: 50px 52px;
    }

    .profile .profile-form .form-control,
    .profile .profile-form .form-select {
        border: 1px solid #F4926B;
        font-size: 20px;
        border-radius: 15px;
    }

    .profile .profile-form .form-label {
        font-weight: bold;
    }

    .profile .profile-form .btn-profile {
        background-color: #F4926B;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        width: 100%;
        font-size: 32px;
    }

    .profile .profile-form .btn-profile:hover {
        color: white;
    }

    .profile .profile-pic {
        margin-top: 30%;
        position: relative;
    }

    .profile .profile-pic img {
        border: 10px solid white;
        cursor: pointer;
        border-radius: 50%
    }

    .profile .profile-pic img:hover {
        box-shadow: 0px 0px 12px black;
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
            <img class="bg-gray" src="{{ asset('/assets/images/signup.svg') }}" alt="">
            <div class="modal-body position-relative">
                <div class="btn-home">
                    <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button2.png') }}" data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="profile">
                    <div class="content row">
                        <div class="col-5 text-center">
                            <div class="profile-pic mb-4">
                                <img class="rounded-circle" src="
                                    @if (Auth::guard('web_barber')->user()->image != null)
                                        {{ asset(Auth::guard('web_barber')->user()->image) }}
                                    @else
                                        {{ asset('/assets/images/member-1.png') }}
                                    @endif
                                " alt="" width="300px">
                                <button class="btn btn-light">
                                    <label style="cursor: pointer" for="image"><i class="fas fa-edit"></i> Edit</label>
                                </button>
                                <div>
                                    <form id="profilePictForm" action="{{route('adminlogic-update-profile-image')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control form-control-sm" id="image" name="image" type="file" accept=".png,.jpg.jpeg" hidden onchange="document.getElementById('profilePictForm').submit()">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="profile-form col-7">
                            <h1 class="text-center fw-bold">My Profile</h1>
                            <form action="{{route('adminlogic-update-profile')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{Auth::guard('web_barber')->user()->name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{Auth::guard('web_barber')->user()->email}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">No Ponsel</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_number" value="{{Auth::guard('web_barber')->user()->phone_number}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="number" class="form-control" id="rate" name="rate" min="0" aria-describedby="rate" value="{{Auth::guard('web_barber')->user()->rate}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" value="">
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-profile" value="UPDATE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
