@include('templates.header')
<style>
    .btn-back {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 100;
    }

    .logo {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }

    .our-service {
        min-height: 100vh;
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
        width: 100px;
        height: 150px;
        background-color: white;
        text-align: center;
        font-weight: bold;
    }

    .our-service .services .service a {
        text-decoration: none;
        color: black;
    }

    .our-service .services .service .img {
        width: 100px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .our-service .services .service .img:hover {
        box-shadow: 0px 0px 10px #00000077
    }

</style>
<div class="btn-back mt-4 ms-4">
    <a href="{{ route('home') }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button.png') }}">
    </a>
</div>

<!-- SERVICE-->
<section id="ourService" class="our-service">
    <img class="bg" src="/assets/images/signup.svg" alt="">
    <div class="content container">
        <h2 class="text-center">Silahkan Pilih Service Anda</h2>
        <article class="services">
            @foreach ($services as $service)
                <div class="service">
                    <form id="serviceForm{{ $service->id }}" action="{{ route('service-logic') }}" method="POST">
                        @csrf
                        <input type="text" name="service_id" id="service_id" hidden readonly value="{{ $service->id }}" />
                        <img style="cursor: pointer" class="img" src="{{ $service->image }}" alt="" srcset="" onclick="document.getElementById('serviceForm{{ $service->id }}').submit()">
                        <p>{{ $service->name }} </p>
                    </form>
                </div>

            @endforeach
        </article>


    </div>
    <div class="logo">
        <img src="#" alt="">
    </div>
</section>



@include('templates.footer')
