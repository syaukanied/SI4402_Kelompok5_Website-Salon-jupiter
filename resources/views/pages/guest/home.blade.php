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


    /* DEFAULT */
    section h2 {
        font-size: 30px;
        font-weight: bold;
    }

    /* HERO */
    /* .hero {
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    } */

    /* .hero .bg {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    } */

    /* .hero .content {
        padding-top: 150px;
        padding-bottom: 100px;
    } */

    /* .hero .logo-lumbs {
        position: absolute;
        right: 50px;
        top: 50px;
    } */

    /* .hero .banner {
        position: absolute;
        top: 200px;
        left: 11%;
        transform: translateX(-60px);
        filter: grayscale(100%)
    } */

    .hero .banner:hover {
        filter: grayscale(0%)
    }

    .hero .video {
        position: absolute;
        transform: translateX(-60px);
        top: 580px;
        left: 21%;
        /* border: 3px solid black;
            border-radius: 8px; */
    }

    /* .hero .book:hover {
            border: 3px solid #284C55;
        } */

    .hero .video .btn-video {
        background-color: #A29487;
        /* border-radius: 5px; */
        color: #fff;
        font-size: 18px;
        /* font-weight: bold; */
        padding: 11px 45px;
        transform: translate(-3px, -3px);
    }

    .hero .video:hover .btn-video {
        background-color: #575E70;
    }


    .hero .book {
        position: absolute;
        transform: translateX(-60px);
        top: 580px;
        left: 13%;
        /* border: 3px solid black;
            border-radius: 8px; */
    }

    /* .hero .book:hover {
            border: 3px solid #284C55;
        } */

    .hero .book .btn-book {
        background-color: #A29487;
        /* border-radius: 5px; */
        color: #fff;
        font-size: 18px;
        /* font-weight: bold; */
        padding: 11px 45px;
        transform: translate(-3px, -3px);
    }

    .hero .book:hover .btn-book {
        background-color: #575E70;
    }

    /* OUR SERVICE */
    .our-service {
        min-height: 90vh;
        position: relative;
        overflow: hidden;
    }

    .our-service .bg {
        opacity: 0.6;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
    }

    .our-service .content {
        position: relative;
        padding-top: 150px;
        padding-bottom: 100px;
    }

    .our-service .services {
        margin: 0 auto;
        margin-top: 60px;
        width: 650px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 100px;
    }

    .our-service .services .service {
        width: 150px;
        height: 150px;
        background-color: white;
        text-align: center;
        font-weight: bold;
    }

    .our-service .services .service .img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    /* OUR HAIR ARTIST */
    .our-artist {
        min-height: 90vh;
        position: relative;
    }

    .our-artist .bg {
        opacity: 0.6;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
    }

    .our-artist .content {
        position: relative;
        padding-top: 150px;
    }

    .our-artist .content {
        position: relative;
        padding-top: 150px;
    }

    .our-artist .artists {
        margin: 0 auto;
        margin-top: 65px;
        width: 870px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 60px;
    }

    .our-artist .artists .artist {
        text-align: center;
        font-weight: bold;
    }

    .our-artist .artists .artist .img {
        width: 250px;
        height: 350px;
        object-fit: cover;
        background-color: white;
    }

    /* OUR PRODUCT*/
    .our-product {
        min-height: 90vh;
        position: relative;
    }

    .our-product .content {
        position: relative;
        padding-top: 150px;
    }

    .our-product .content {
        position: relative;
        padding-top: 150px;
    }

    .our-product .products {
        margin-left: 40px;
        margin-top: 65px;
        width: 628px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 89px;
    }

    .our-product .products .product {
        background-color: white;
        text-align: center;
        font-weight: bold;
    }

    .our-product .products .product .img {
        width: 150px;
        height: 150px;
        object-fit: contain;
    }

    /* ABOUT */
    .about {
        min-height: 768px;
        position: relative;
        overflow: hidden;
    }

    .about .bg {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
        filter: grayscale(100%);
    }

    .about .content {
        position: relative;
        padding-top: 150px;
        padding-bottom: 100px;
    }

    .about .about-img {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 700px;
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
    html,
    body {
        max-width: 100%;
        overflow-x: hidden;
    }

    .paragraph {
        width: 150%;
    }

    .footer-section {
        padding: 80px 0;
        background: #ffffff;
    }

    .footer-section .relative {
        position: relative;
    }

    .footer-section a {
        text-decoration: none;
        color: #2f2f2f;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .footer-section a:hover {
        color: rgba(47, 47, 47, 0.5);
    }

    .footer-section .subscription-form {
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
        margin-top: 100px;
    }

    @media (min-width: 992px) {
        .footer-section .subscription-form {
            margin-top: 0px;
            margin-bottom: 80px;
        }
    }

    .footer-section .subscription-form h3 {
        font-size: 18px;
        font-weight: 500;
        color: #3b5d50;
    }

    .footer-section .subscription-form .form-control {
        height: 50px;
        border-radius: 10px;
        font-family: "Inter", sans-serif;
    }

    .footer-section .subscription-form .form-control:active,
    .footer-section .subscription-form .form-control:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #3b5d50;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2);
    }

    .footer-section .subscription-form .form-control::-webkit-input-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control::-moz-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control:-ms-input-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control:-moz-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .btn {
        border-radius: 10px !important;
    }

    .footer-section .sofa-img {
        position: absolute;
        top: -200px;
        z-index: 1;
        right: 0;
    }

    .footer-section .sofa-img img {
        max-width: 380px;
    }

    .footer-section .links-wrap {
        margin-top: 0px;
    }

    @media (min-width: 992px) {
        .footer-section .links-wrap {
            margin-top: 54px;
        }
    }

    .footer-section .links-wrap ul li {
        margin-bottom: 10px;
    }

    .footer-section .footer-logo-wrap .footer-logo {
        font-size: 32px;
        font-weight: 500;
        text-decoration: none;
        color: #3b5d50;
    }

    .footer-section .custom-social li {
        margin: 2px;
        display: inline-block;
    }

    .footer-section .custom-social li a {
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        display: inline-block;
        background: #dce5e4;
        color: #3b5d50;
        border-radius: 50%;
    }

    .footer-section .custom-social li a:hover {
        background: #3b5d50;
        color: #ffffff;
    }

    .footer-section .border-top {
        border-color: #dce5e4;
    }

    .footer-section .border-top.copyright {
        font-size: 14px !important;
    }

    .btn {
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 30px;
        color: #ffffff;
    }

    .btn:active,
    .btn:focus {
        outline: none !important;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .btn.btn-primary {
        background: #3b5d50;
        border-color: #3b5d50;
    }

    .btn.btn-primary:hover {
        background: #314d43;
        border-color: #314d43;
    }


    .testimonial-section {
        padding: 3rem 0 7rem 0;
    }

    .testimonial-slider-wrap {
        position: relative;
    }

    .testimonial-slider-wrap .tns-inner {
        padding-top: 30px;
    }

    .testimonial-slider-wrap .item .testimonial-block blockquote {
        font-size: 16px;
    }

    @media (min-width: 768px) {
        .testimonial-slider-wrap .item .testimonial-block blockquote {
            line-height: 32px;
            font-size: 18px;
        }
    }

    .testimonial-slider-wrap .item .testimonial-block .author-info .author-pic {
        margin-bottom: 20px;
    }

    .testimonial-slider-wrap .item .testimonial-block .author-info .author-pic img {
        max-width: 80px;
        border-radius: 50%;
    }

    .testimonial-slider-wrap .item .testimonial-block .author-info h3 {
        font-size: 14px;
        font-weight: 700;
        color: #2f2f2f;
        margin-bottom: 0;
    }

    .testimonial-slider-wrap #testimonial-nav {
        position: absolute;
        top: 35%;
        z-index: 99;
        width: 100%;
        display: none;
    }

    @media (min-width: 768px) {
        .testimonial-slider-wrap #testimonial-nav {
            display: block;
        }
    }

    .testimonial-slider-wrap #testimonial-nav>span {
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
        transition: .3s all ease;
    }

    .testimonial-slider-wrap #testimonial-nav>span:hover {
        background: #3b5d50;
        color: #ffffff;
    }

    .testimonial-slider-wrap #testimonial-nav .prev {
        left: -10px;
    }

    .testimonial-slider-wrap #testimonial-nav .next {
        right: 0;
    }

    .testimonial-slider-wrap .tns-nav {
        position: absolute;
        bottom: -50px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .testimonial-slider-wrap .tns-nav button {
        background: none;
        border: none;
        display: inline-block;
        position: relative;
        width: 0 !important;
        height: 7px !important;
        margin: 2px;
    }

    .testimonial-slider-wrap .tns-nav button:active,
    .testimonial-slider-wrap .tns-nav button:focus,
    .testimonial-slider-wrap .tns-nav button:hover {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        background: none;
    }

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
        background-color: #d6d6d6;
    }

    .testimonial-slider-wrap .tns-nav button:hover:before,
    .testimonial-slider-wrap .tns-nav button.tns-nav-active:before {
        background-color: #3b5d50;
    }

    .tns-outer {
        padding: 0 !important
    }

    .tns-outer [hidden] {
        display: none !important
    }

    .tns-outer [aria-controls],
    .tns-outer [data-action] {
        cursor: pointer
    }

    .tns-slider {
        -webkit-transition: all 0s;
        -moz-transition: all 0s;
        transition: all 0s
    }

    .tns-slider>.tns-item {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    .tns-horizontal.tns-subpixel {
        white-space: nowrap
    }

    .tns-horizontal.tns-subpixel>.tns-item {
        display: inline-block;
        vertical-align: top;
        white-space: normal
    }

    .tns-horizontal.tns-no-subpixel:after {
        content: '';
        display: table;
        clear: both
    }

    .tns-horizontal.tns-no-subpixel>.tns-item {
        float: left
    }

    .tns-horizontal.tns-carousel.tns-no-subpixel>.tns-item {
        margin-right: -100%
    }

    .tns-no-calc {
        position: relative;
        left: 0
    }

    .tns-gallery {
        position: relative;
        left: 0;
        min-height: 1px
    }

    .tns-gallery>.tns-item {
        position: absolute;
        left: -100%;
        -webkit-transition: transform 0s, opacity 0s;
        -moz-transition: transform 0s, opacity 0s;
        transition: transform 0s, opacity 0s
    }

    .tns-gallery>.tns-slide-active {
        position: relative;
        left: auto !important
    }

    .tns-gallery>.tns-moving {
        -webkit-transition: all 0.25s;
        -moz-transition: all 0.25s;
        transition: all 0.25s
    }

    .tns-autowidth {
        display: inline-block
    }

    .tns-lazy-img {
        -webkit-transition: opacity 0.6s;
        -moz-transition: opacity 0.6s;
        transition: opacity 0.6s;
        opacity: 0.6
    }

    .tns-lazy-img.tns-complete {
        opacity: 1
    }

    .tns-ah {
        -webkit-transition: height 0s;
        -moz-transition: height 0s;
        transition: height 0s
    }

    .tns-ovh {
        overflow: hidden
    }

    .tns-visually-hidden {
        position: absolute;
        left: -10000em
    }

    .tns-transparent {
        opacity: 0;
        visibility: hidden
    }

    .tns-fadeIn {
        opacity: 1;
        filter: alpha(opacity=100);
        z-index: 0
    }

    .tns-normal,
    .tns-fadeOut {
        opacity: 0;
        filter: alpha(opacity=0);
        z-index: -1
    }

    .tns-vpfix {
        white-space: nowrap
    }

    .tns-vpfix>div,
    .tns-vpfix>li {
        display: inline-block
    }

    .tns-t-subp2 {
        margin: 0 auto;
        width: 310px;
        position: relative;
        height: 10px;
        overflow: hidden
    }

    .tns-t-ct {
        width: 2333.3333333%;
        width: -webkit-calc(100% * 70 / 3);
        width: -moz-calc(100% * 70 / 3);
        width: calc(100% * 70 / 3);
        position: absolute;
        right: 0
    }

    .tns-t-ct:after {
        content: '';
        display: table;
        clear: both
    }

    .tns-t-ct>div {
        width: 1.4285714%;
        width: -webkit-calc(100% / 70);
        width: -moz-calc(100% / 70);
        width: calc(100% / 70);
        height: 10px;
        float: left
    }

    .product-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;
        color: black;
        justify-content: center;
        /* justify-content: right; */
        opacity: 0.85;
    }
</style>

@include('templates.navbar')
<main>
    <!-- HERO-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="bg" src="/assets/images/head.svg" style="position: absolute; left: 0; top: 50px; width: 100%; height: 100%; object-fit: cover;" alt="">
        <div class="content container" style="padding-top: 150px; padding-bottom: 100px;">
            <div class="logo-lumbs" style="position: absolute; right: 50px; top: 50px;">
                <img src="" alt="">
            </div>
            <div class="banner" style="position: absolute; top: 50px; left: 11%; transform: translateX(-60px); filter: grayscale(100%)">
                <img src="/assets/images/BANNER-collored.png" alt="">
            </div>
            <div class="book">
                @if (Auth::guard('web')->check())
                <a href="/service">
                    <button class="btn btn-book">BOOK</button>
                </a>
                @else
                <button class="btn btn-book" data-bs-toggle="modal" data-bs-target="#signIn">BOOK</button>
                @endif
            </div> &nbsp;&nbsp;&nbsp;
            <div class="video">
                <a href="https://www.youtube.com/channel/UCezsa47t6KPsUOzpfGGgHzA">
                    <button class="btn btn-video" style="margin-left: 50px;">VIDEO</button>
                </a>
            </div>
        </div>
    </div>
    <div class="carousel-item">
    <img class="bg" src="/assets/images/111.jpg" style="position: absolute; left: 0; top: 50px; width: 100%; height: 100%; object-fit: cover;" alt="">
        <div class="content container" style="padding-top: 150px; padding-bottom: 100px;">
            <div class="logo-lumbs" style="position: absolute; right: 50px; top: 50px;">
                <img src="" alt="">
            </div>
            <div class="banner" style="position: absolute; top: 50px; left: 11%; transform: translateX(-60px); filter: grayscale(100%)">
                <img src="/assets/images/BANNER-collored.png" alt="">
            </div>
            <div class="book">
                @if (Auth::guard('web')->check())
                <a href="/service">
                    <button class="btn btn-book">BOOK</button>
                </a>
                @else
                <button class="btn btn-book" data-bs-toggle="modal" data-bs-target="#signIn">BOOK</button>
                @endif
            </div> &nbsp;&nbsp;&nbsp;

            <div class="video">
                <a href="https://www.youtube.com/channel/UCezsa47t6KPsUOzpfGGgHzA">
                    <button class="btn btn-video" style="margin-left: 50px;;">VIDEO</button>
                </a>
            </div>
        </div>
    </div>
    <div class="carousel-item">
    <img class="bg" src="/assets/images/last.jpg" style="position: absolute; left: 0; top: 50px; width: 100%; height: 100%; object-fit: cover;" alt="">
        <div class="content container" style="padding-top: 150px; padding-bottom: 100px;">
            <div class="logo-lumbs" style="position: absolute; right: 50px; top: 50px;">
                <img src="" alt="">
            </div>
            <div class="banner" style="position: absolute; top: 50px; left: 11%; transform: translateX(-60px); filter: grayscale(100%)">
                <img src="/assets/images/BANNER-collored.png" alt="">
            </div>
            <div class="book">
                @if (Auth::guard('web')->check())
                <a href="/service">
                    <button class="btn btn-book">BOOK</button>
                </a>
                @else
                <button class="btn btn-book" data-bs-toggle="modal" data-bs-target="#signIn">BOOK</button>
                @endif
            </div> &nbsp;&nbsp;&nbsp;

            <div class="video">
                <a href="https://www.youtube.com/channel/UCezsa47t6KPsUOzpfGGgHzA">
                    <button class="btn btn-video" style="margin-left: 50px;;">VIDEO</button>
                </a>
            </div>
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <!-- <section class="hero" style="min-height: 100vh; position: relative; overflow: hidden;">
        <img class="bg" src="/assets/images/head.svg" style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; object-fit: cover;" alt="">
        <div class="content container" style="padding-top: 150px; padding-bottom: 100px;">
            <div class="logo-lumbs" style="position: absolute; right: 50px; top: 50px;">
                <img src="" alt="">
            </div>
            <div class="banner" style="position: absolute; top: 200px; left: 11%; transform: translateX(-60px); filter: grayscale(100%)">
                <img src="/assets/images/BANNER-collored.png" alt="">
            </div>
            <div class="book">
                @if (Auth::guard('web')->check())
                <a href="/service">
                    <button class="btn btn-book">BOOK</button>
                </a>
                @else
                <button class="btn btn-book" data-bs-toggle="modal" data-bs-target="#signIn">BOOK</button>
                @endif
            </div> &nbsp;&nbsp;&nbsp;

            <div class="video">
                <a href="https://www.youtube.com/channel/UCezsa47t6KPsUOzpfGGgHzA">
                    <button class="btn btn-video" style="margin-left: 50px;;">VIDEO</button>
                </a>
            </div>
        </div>
    </section> -->
    <!-- SERVICE-->
    <section id="ourService" class="our-service">
        <img class="bg" src="/assets/images/ser.svg"><br><br>
        <!-- <div class="content container" style="opacity: 0.9;"> -->
            <b><h2 class="text-center" style="color:#A29487;font-family: 'Trebuchet MS', sans-serif;">Our Services</h2></b><br>
            <div class="product-grid" style="cursor:pointer;">
                @foreach ($services as $service)
                <form id="serviceForm{{ $service->id }}" action="{{ route('service-logic') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}" readonly />
                    <div class="card mx-3 mt-4" style="width:17rem;background-color:#D6C2BE;margin-right:5px;border-radius: 10px;" onclick="document.getElementById('serviceForm{{ $service->id }}').submit()">
                        <div class="rounded"><img style="height:200px;object-fit:cover;" class="card-img rounded-3 mx-auto d-block" src="{{ $service->image }}"></div>
                        <div class="card-body" style="cursor: pointer; background-color:rgba(0,0,0,0.2);">
                            <h5 class="card-title" style="color:white;font-family: 'Trebuchet MS', sans-serif;"><b>{{ $service->name }}</b></h5>
                            <p class="card-text" style="color:white; ">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        <!-- </div> -->
    </section>
    <!-- OUR HAIR ARTIST -->
    <section id="ourArtist" class="our-artist">
        <div class="content container">
            <h2 class="text-center" style="color:#A29487;font-family: 'Trebuchet MS', sans-serif;">Our Hair Artists</h2>
            <article class="artists">
                @foreach ($barbers as $barber)
                <div class="artist">
                    <p>{{$barber->name}}</p>
                    <img class="img" style="border-radius: 10px;" src="
                            @if ($barber->image != null)
                                {{asset($barber->image)}}
                            @else
                                https://thumbs.dreamstime.com/b/bearded-man-male-portrait-stylish-beard-barber-scissors-straight-razor-shop-vintage-barbershop-shaving-219675564.jpg
                            @endif
                        ">
                </div>
                @endforeach
            </article>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section id="testimonial" class="testimonial-section" style="margin-top: 50px; background-color: #EFEFEF;">
        <div class="testimonial-section">
            <div class="container text-center center">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center">
                        <h2 class="section-title">Testimonials</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="testimonial-slider-wrap text-center">
                            <div id="testimonial-nav">
                                <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                                <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                            </div>
                            <div class="testimonial-slider">

                                <div class="item">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 mx-auto">

                                            <div class="testimonial-block text-center">
                                                <blockquote class="mb-8">
                                                    <p>&ldquo;
                                                        5-star service & haircut! Daniela was very informative on the best way to care for my hair, including product recommendations for my specific concerns. She took her time on my thick, long hair. They also use all high-quality products and she seriously gave me one of my best haircuts I’ve ever had, doing exactly what I had asked for. Everyone was so friendly and ready to help. I’m so happy & relieved to have finally found my new hair salon.
                                                        &rdquo;</p>
                                                </blockquote>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 mx-auto">

                                            <div class="testimonial-block text-center">
                                                <blockquote class="mb-8">
                                                    <p>&ldquo;One of the best salon experiences I've ever had! From the dry consultation to the aroma therapy head massage, Jupiter has a way of making you feel and look like a million bucks! She's truly one of the most unique hair stylists I've ever met. I recommend her to all my friends and family.&rdquo;</p>
                                                </blockquote>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END item -->

                                <!-- END item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Slider -->


    <!-- ABOUT US -->
    <section id="aboutUs" class="about">
        <div class="row" style="background-color:#b29a7f">
            <div class="col-md-6">
                <img style="width: 100%;height:700px;object-fit:cover;" src="/assets/images/pexels1.jpeg" alt="">
            </div>
            <div class="col-md-6">
                <img style="width: 100%;height:700px;object-fit:cover;" src="/assets/images/aboutus.png" alt="">
            </div>
        </div>
    </section>
    <!-- CONTACT US -->
</main>

<body>
    <footer id="footer" class="footer-section">
        <div class="container relative">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Jupiter<span>.</span></a></div>
                    <p class="mb-4">Situs Kosmetik Terlengkap & Terpercaya #1 di Indonesia!</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="https://www.facebook.com/"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="https://twitter.com/"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="https://www.instagram.com/"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="https://www.linkedin.com/"><span class="fab fa-linkedin-in"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <div class="row links-wrap">
                        <ul class="list-unstyled">
                            <li><a href="about.html">About us</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img src="/assets/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary" style="background-color: #575E70;">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


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
                                <p><b>
                                        <center>KELOMPOK 5</center>
                                    </b></p>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
<button class="btn-to-top btn" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
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