@include('templates.header')

<style>
    /* body {
        font-family: 'Trebuchet MS', sans-serif;
        font-family: Garamond, serif;    
    } */
    .btn-back {
        position: absolute;
        /* top: 20px; */
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

    /* .our-service .bg {
        opacity: 0.6;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
    } */

    .our-service .content {
        position: relative;
        /* padding-top: 35px; */
        margin-top: 110px;
        /* padding-bottom: 100px; */
        margin-bottom: 100px;
        background-color:rgba(192, 174, 170, 0.8);
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
        background-color: white;
        text-align: center;
        font-weight: bold;
        min-height: 200px;
        height: 10vh;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
        border-radius: 15px;
    }

    .our-service .services .service a {
        text-decoration: none;
        color: black;
        
    }

    .our-service .services .service .img {
        width: 100px;
        height: 150px;
        margin-bottom: 10px;
        
        
    }

    .our-service .services .service .img:hover {
        box-shadow: 0px 0px 10px #00000077
    }
    </style>
    
@include('templates.navbar')
<br><br><br><br>
<!-- <div class="btn-back mt-4 ms-4">
    <a href="{{ url('') }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button2.png') }}">
    </a>
</div> -->

<!-- SERVICE-->
    <img class="bg" style="opacity: 0.3; position: absolute; left: 0; top: 0; min-width: 100%; min-height: 100%;" src="/assets/images/bgtest2.jpeg" alt="">
<section id="ourService" class="our-service">
    <div class="content container rounded-3">
        <br><br>
        <h2 class="text-center" style="color:white;font-family: 'Trebuchet MS', sans-serif;">Choose Your Service</h2>
        <br><br><br>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-4">
                <form id="serviceForm{{ $service->id }}" action="{{ route('service-logic') }}" method="POST">
                @csrf
                    <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}" readonly/>
                    <div class="card" style="width:100%;background-color:#D6C2BE;margin-right:5px;">
                        <img style="max-height:200px;" class="card-img rounded-3 mx-auto d-block" src="{{ $service->image }}">
                        <div class="card-img-overlay" style="cursor: pointer; background-color:rgba(0,0,0,0.2);" onclick="document.getElementById('serviceForm{{ $service->id }}').submit()">
                            <br><br><br>
                            <h5 class="card-title" style="color:white;font-family: 'Trebuchet MS', sans-serif;"><b>{{ $service->name }}</b></h5>
                            <p class="card-text" style="color:white; ">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
        <br><br><br><br><br>
    </div>
</section>

@include('templates.footer')
