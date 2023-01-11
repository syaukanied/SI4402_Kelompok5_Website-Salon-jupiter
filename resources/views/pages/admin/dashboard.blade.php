@extends('layouts.base')

@section('main')
    <style>
        .navbar-dark.bg-dark {
            background-color: #A29487 !important;
            padding: 0 6%;
            padding-top: 5px;
            padding-bottom: 5px;
            /* position: fixed;
            top: 2;
            overflow: hidden; */
        }

        .nav-item a {
            font-size: 17px;
        }

        .btn-sign-up {
            border: 2px solid #F5C793;
            background-color: #000;
            color: #F5C793;
            font-size: 12px;
            padding: 13px 20px;
        }

        .btn-sign-in {
            background-color: #F5C793;
            color: #fff;
            font-size: 12px;
            padding: 13px 20px;
        }

        /* FOOTER */
        footer {
            padding-top: 100px;
            background-color: #A29487;
        }

        hr {
            background-color: #F4926B;
        }

        /* script menghilangkan Horizontal Scroll */
        html, body {
        max-width: 100%;
        overflow-x: hidden;
        }

        .paragraph {
        width: 150%;
        }

    .footer-section {
    padding: 80px 0;
    background: #ffffff; }
    .footer-section .relative {
        position: relative; }
    .footer-section a {
        text-decoration: none;
        color: #2f2f2f;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease; }
        .footer-section a:hover {
        color: rgba(47, 47, 47, 0.5); }
    .footer-section .subscription-form {
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
        margin-top: 100px; }
        @media (min-width: 992px) {
        .footer-section .subscription-form {
            margin-top: 0px;
            margin-bottom: 80px; } }
        .footer-section .subscription-form h3 {
        font-size: 18px;
        font-weight: 500;
        color: #3b5d50; }
        .footer-section .subscription-form .form-control {
        height: 50px;
        border-radius: 10px;
        font-family: "Inter", sans-serif; }
        .footer-section .subscription-form .form-control:active, .footer-section .subscription-form .form-control:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: #3b5d50;
            -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2); }
        .footer-section .subscription-form .form-control::-webkit-input-placeholder {
            font-size: 14px; }
        .footer-section .subscription-form .form-control::-moz-placeholder {
            font-size: 14px; }
        .footer-section .subscription-form .form-control:-ms-input-placeholder {
            font-size: 14px; }
        .footer-section .subscription-form .form-control:-moz-placeholder {
            font-size: 14px; }
        .footer-section .subscription-form .btn {
        border-radius: 10px !important; }
    .footer-section .sofa-img {
        position: absolute;
        top: -200px;
        z-index: 1;
        right: 0; }
        .footer-section .sofa-img img {
        max-width: 380px; }
    .footer-section .links-wrap {
        margin-top: 0px; }
        @media (min-width: 992px) {
        .footer-section .links-wrap {
            margin-top: 54px; } }
        .footer-section .links-wrap ul li {
        margin-bottom: 10px; }
    .footer-section .footer-logo-wrap .footer-logo {
        font-size: 32px;
        font-weight: 500;
        text-decoration: none;
        color: #3b5d50; }
    .footer-section .custom-social li {
        margin: 2px;
        display: inline-block; }
        .footer-section .custom-social li a {
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        display: inline-block;
        background: #dce5e4;
        color: #3b5d50;
        border-radius: 50%; }
        .footer-section .custom-social li a:hover {
            background: #3b5d50;
            color: #ffffff; }
    .footer-section .border-top {
        border-color: #dce5e4; }
        .footer-section .border-top.copyright {
        font-size: 14px !important; }
    
    .btn {
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 30px;
        color: #ffffff; }
    .btn:active, .btn:focus {
        outline: none !important;
        -webkit-box-shadow: none;
        box-shadow: none; }
    .btn.btn-primary {
        background: #3b5d50;
        border-color: #3b5d50; }
        .btn.btn-primary:hover {
        background: #314d43;
        border-color: #314d43; }


.testimonial-section {
  padding: 3rem 0 7rem 0; }

.testimonial-slider-wrap {
  position: relative; }
  .testimonial-slider-wrap .tns-inner {
    padding-top: 30px; }
  .testimonial-slider-wrap .item .testimonial-block blockquote {
    font-size: 16px; }
    @media (min-width: 768px) {
      .testimonial-slider-wrap .item .testimonial-block blockquote {
        line-height: 32px;
        font-size: 18px; } }
  .testimonial-slider-wrap .item .testimonial-block .author-info .author-pic {
    margin-bottom: 20px; }
    .testimonial-slider-wrap .item .testimonial-block .author-info .author-pic img {
      max-width: 80px;
      border-radius: 50%; }
  .testimonial-slider-wrap .item .testimonial-block .author-info h3 {
    font-size: 14px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 0; }
  .testimonial-slider-wrap #testimonial-nav {
    position: absolute;
    top: 50%;
    z-index: 99;
    width: 100%;
    display: none; }
    @media (min-width: 768px) {
      .testimonial-slider-wrap #testimonial-nav {
        display: block; } }
    .testimonial-slider-wrap #testimonial-nav > span {
      cursor: pointer;
      position: absolute;
      width: 58px;
      height: 58px;
      line-height: 58px;
      border-radius: 50%;
      background: rgba(59, 93, 80, 0.1);
      color: #2f2f2f;
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease; }
      .testimonial-slider-wrap #testimonial-nav > span:hover {
        background: #3b5d50;
        color: #ffffff; }
    .testimonial-slider-wrap #testimonial-nav .prev {
      left: -10px; }
    .testimonial-slider-wrap #testimonial-nav .next {
      right: 0; }
  .testimonial-slider-wrap .tns-nav {
    position: absolute;
    bottom: -50px;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%); }
    .testimonial-slider-wrap .tns-nav button {
      background: none;
      border: none;
      display: inline-block;
      position: relative;
      width: 0 !important;
      height: 7px !important;
      margin: 2px; }
      .testimonial-slider-wrap .tns-nav button:active, .testimonial-slider-wrap .tns-nav button:focus, .testimonial-slider-wrap .tns-nav button:hover {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        background: none; }
      .testimonial-slider-wrap .tns-nav button:before {
        display: block;
        width: 7px;
        height: 7px;
        left: 0;
        top: 0;
        position: absolute;
        content: "";
        border-radius: 50%;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
        background-color: #d6d6d6; }
      .testimonial-slider-wrap .tns-nav button:hover:before, .testimonial-slider-wrap .tns-nav button.tns-nav-active:before {
        background-color: #3b5d50; }

    .tns-outer{padding:0 !important}
    .tns-outer [hidden]{display:none !important}
    .tns-outer [aria-controls],
    .tns-outer [data-action]{cursor:pointer}
    .tns-slider{-webkit-transition:all 0s;-moz-transition:all 0s;transition:all 0s}.tns-slider>
    .tns-item{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
    .tns-horizontal.tns-subpixel{white-space:nowrap}
    .tns-horizontal.tns-subpixel>.tns-item{display:inline-block;vertical-align:top;white-space:normal}
    .tns-horizontal.tns-no-subpixel:after{content:'';display:table;clear:both}
    .tns-horizontal.tns-no-subpixel>.tns-item{float:left}.tns-horizontal.tns-carousel.tns-no-subpixel>.tns-item{margin-right:-100%}
    .tns-no-calc{position:relative;left:0}.tns-gallery{position:relative;left:0;min-height:1px}.tns-gallery>
    .tns-item{position:absolute;left:-100%;-webkit-transition:transform 0s, opacity 0s;-moz-transition:transform 0s, opacity 0s;transition:transform 0s, opacity 0s}
    .tns-gallery>.tns-slide-active{position:relative;left:auto !important}.tns-gallery>.tns-moving{-webkit-transition:all 0.25s;-moz-transition:all 0.25s;transition:all 0.25s}
    .tns-autowidth{display:inline-block}.tns-lazy-img{-webkit-transition:opacity 0.6s;-moz-transition:opacity 0.6s;transition:opacity 0.6s;opacity:0.6}
    .tns-lazy-img.tns-complete{opacity:1}.tns-ah{-webkit-transition:height 0s;-moz-transition:height 0s;transition:height 0s}.tns-ovh{overflow:hidden}
    .tns-visually-hidden{position:absolute;left:-10000em}.tns-transparent{opacity:0;visibility:hidden}.tns-fadeIn{opacity:1;filter:alpha(opacity=100);z-index:0}
    .tns-normal,.tns-fadeOut{opacity:0;filter:alpha(opacity=0);z-index:-1}.tns-vpfix{white-space:nowrap}.tns-vpfix>div,.tns-vpfix>li{display:inline-block}
    .tns-t-subp2{margin:0 auto;width:310px;position:relative;height:10px;overflow:hidden}
    .tns-t-ct{width:2333.3333333%;width:-webkit-calc(100% * 70 / 3);width:-moz-calc(100% * 70 / 3);width:calc(100% * 70 / 3);position:absolute;right:0}
    .tns-t-ct:after{content:'';display:table;clear:both}.tns-t-ct>div{width:1.4285714%;width:-webkit-calc(100% / 70);width:-moz-calc(100% / 70);width:calc(100% / 70);height:10px;float:left}

    </style>

    @include('templates.navbar')
    <main>
        <br><br><br>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2>Waiting for Approval</h2><br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Status</th>
                                <th>Tipe</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Artist</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                            @foreach($idleOrders as $idleOrders)
                            <tr>
                                <td scope="row">
                                    <button type="button" class="btn btn-info btn-sm py-0" style="font-size: 0.8em; cursor:default;">Waiting</button>
                                </td>
                                <td>{{$idleOrders->service->name}}</td>
                                <td>{{$idleOrders->address}}</td>
                                <td>{{$idleOrders->date}}</td>
                                <td>
                                    <span class="cat-links">
                                        {{$idleOrders->barber->name ?? '-'}}
                                    </span>
                                </td>
                                <td>{{$idleOrders->price}}</td>
                                <td>
                                    <form method="POST" action="{{route('storeDashboard')}}">
                                    @csrf
                                        <input type="hidden" name="id" value="{{$idleOrders->id}}" readonly>
                                        <input type="hidden" id="status{{$idleOrders->id}}" name="status" readonly>
                                        <button type="submit" value="1" onclick='document.getElementById("status{{$idleOrders->id}}").value = "1"' class="btn btn-success btn-sm py-0" style="font-size: 0.8em;">Approve</button>
                                        <button type="submit" value="2" onclick='document.getElementById("status{{$idleOrders->id}}").value = "2"' class="btn btn-danger btn-sm py-0" style="font-size: 0.8em;">Reject</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2>Orders</h2><br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Status</th>
                                <th>Tipe</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Artist</th>
                                <th>Harga</th>
                            </tr>
                            @foreach($orders as $orders)
                            <tr>
                                @if($orders->status == '1')
                                <td>
                                    <button type="button" class="btn btn-success btn-sm py-0" style="font-size: 0.8em; cursor:default;">Approved</button>
                                </td>
                                @elseif($orders->status == '2')
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm py-0" style="font-size: 0.8em; cursor:default;">Rejected</button>
                                </td>
                                @endif
                                <td>{{$orders->service->name}}</td>
                                <td>{{$orders->address}}</td>
                                <td>{{$orders->date}}</td>
                                <td>
                                    <span class="cat-links">
                                        {{$orders->barber->name ?? '-'}}
                                    </span>
                                </td>
                                <td>{{$orders->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<body>
    <footer id="footer" class="footer-section">
            <div class="row g-5 mb-5">
                    <footer class="text-white text-center pb-3" style="background-color:#fff;">
                        <button class="btn btn-secondary justify-content-center" data-bs-target="#reg-modal" data-bs-toggle="modal">
                            Copyright 2022 Kelompok 5 Jupiter
                        </button>
                    </footer>

                    <div class="modal fade" tabindex="-1" id="reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Copyright</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b><center>KELOMPOK 5</center></b></p>
                                    <br />
                                    <p>1. Afifah Hasna Wafiyah</p>
                                    <br />
                                    <p>2. Shintya Rahma Safitri</p>
                                    <br />
                                    <p>3. Ignatius Christ Surya</p>
                                    <br />
                                    <p>4. Rahman Dilan Syaukanie</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
			</div>
        </div>
    </footer>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/tiny-slider.js"></script>
    <script src="/assets/js/custom.js"></script> 
</body>
        

    <!-- Modal -->
    @include('components.modal.sign-up')
    @include('components.modal.sign-in')
    @auth('web')
        @include('components.modal.profile')
    @endauth
    @include('templates.footer')
@endsection


@section('script')
    {{-- registration failed --}}
    @if (session('registration-fail') && $errors->all() != null)))
        <script>
            let myModal = new bootstrap.Modal(document.getElementById('signUp'), {
                keyboard: false
            })
            myModal.show();
        </script>
    @endif

    @if (session('update-profile-fail') && $errors->all() != null)))
        <script>
            let myModal = new bootstrap.Modal(document.getElementById('profile'), {
                keyboard: false
            })
            myModal.show();
        </script>
    @endif

    @if (session('login-fail') && $errors->all() != null)))
        <script>
            let myModal = new bootstrap.Modal(document.getElementById('signIn'), {
                keyboard: false
            })
            myModal.show();
        </script>
    @endif
@endsection