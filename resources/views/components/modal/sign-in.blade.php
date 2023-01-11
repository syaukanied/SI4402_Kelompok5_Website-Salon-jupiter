<div class="modal fade" id="signIn" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signIn" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="sign-in">
                    <br>
                    <br>
                    <img src="./assets/images/Jupiter.png" alt="" width="200" height="200">
                    <br>
                    <br>
                    <br>
                    <h3>Sign in</h3>
                    @if (session('login-fail'))
                        <div class="alert alert-danger">{{session('login-fail')}}</div>
                    @endif
                    <p class="fs-6">Enter your email and password</p>
                    <form class="login-form" action="{{ route('logic-login') }}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-around">
                            <input type="submit" name="submit-user" id="submit-user" class="btn btn-orange" value="Sign In">
                            <input type="submit" name="submit-barber" id="submit-barber" class="btn btn-orange" value="Login as Admin">
                        </div>
                    </form>
                    <div class="my-4">
                        <p>Dont have any account? Regist <a class="text-brown" data-bs-target="#signUp" data-bs-toggle="modal">here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
