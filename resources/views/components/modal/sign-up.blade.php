{{-- @if (session('registration-fail') || $errors->all() == null)) --}}
{{-- open sign up modal if registration error --}}
{{-- <script> $('#signUp').modal('show');</script> --}}
{{-- @endif --}}
<div class="modal fade" id="signUp" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signUp" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <br>
            <br>
            <img class="bg-gray" src="./assets/images/signup.svg" alt="">
            <div class="modal-body">
                <div class="sign-up">
                    <div class="content row" style="background-image: url('./assets/images/login.png');">
                        <div class="col-6">
                            <div class="mt-4 ms-4">
                                <img style="cursor: pointer;" src="./assets/images/back-button.png" data-bs-dismiss="modal" aria-label="Close">
                            </div>
                            <!-- <div class="text-center mt-4">
                                <img src="./assets/images/Jupiter.png" alt="" width="500" height="300">
                            </div> -->
                        </div>
                        <div class="registration-form col-6">
                            <h1 class="text-center fw-bold">Registration</h1>
                            @if (session('registration-fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('registration-fail') }}
                                </div>
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form action="{{ route('logic-register-user') }}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">No Ponsel</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" aria-describedby="phone_number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" aria-label="gender" name="gender" id="gender" required>
                                        <option selected disabled value="null">Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" aria-describedby="address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <button type="submit" class="btn btn-registration">Register</button>
                            </form>
                                <div class="my-4">
                                    <p><center>Do you have account? Login Now!<a class="text-brown" data-bs-target="#signIn" data-bs-toggle="modal">here</a></p></center>
                                </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
