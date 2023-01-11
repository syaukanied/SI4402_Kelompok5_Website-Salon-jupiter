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

    .our-artist {
        height: 100vh;
        position: relative;
    }

    .our-artist .bg {
        opacity: 0.3;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        /* object-fit: cover; */
    }

    .our-artist .content {
        position: relative;
        padding-top: 50px;
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

    .our-artist .artists .artist .price {
        font-size: 24px;
    }

    .our-artist .artists .artist .btn {
        background-color: #f5c793;
        width: 120px;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
    }

    .our-artist .artists .artist .btn:hover {
        background-color: #f1af62;
    }

    .modal-dialog .modal-content {
        border-radius: 20px;
    }

    .form-control,
    .form-select {
        border: 1px solid #F4926B;
        font-size: 20px;
        border-radius: 15px;
    }

    .btn.btn-brown {
        padding: 10px 50px;
    }

    .pilihartis {
        background-color:rgba(192, 174, 170, 0.8);
        padding: 30px;
        border-radius: 8px;
    }
</style>
@include('templates.navbar')
<br><br><br><br>
<!-- <div class="btn-back mt-4 ms-4">
<br><br><br>
    <a href=" {{ url()->previous() }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button2.png') }}">
    </a>
</div> -->

<!-- ourArtist-->
<section id="ourArtist" class="our-artist">
    <img class="bg" style="position:fixed;" src="/assets/images/bgtest2.jpeg" alt=""><br><br><br>
    <div class="content container rounded-3">
        <div class="pilihartis">
        <br>
            <b><h2 class="text-center" style="color:white; font-family: 'Trebuchet MS', sans-serif;">Pilih Hair Artist</h2></b><br>
            <div class="row center text-center row-cols-1 row-cols-md-3 px-2 g-4" style="margin-top: 20px;">
                @foreach ($barbers as $barber)
                <div class="artist">
                    <div class="position-relative">
                        <b><p style="color:white; font-family: 'Trebuchet MS', sans-serif;">{{$barber->name}}</p></b>
                        <img class="img" style="object-fit:cover;border-radius: 8px;width: 250px;height: 350px;" src="
                                @if ($barber->image !== null)
                                    {{asset($barber->image)}}
                                @else
                                    https://thumbs.dreamstime.com/b/bearded-man-male-portrait-stylish-beard-barber-scissors-straight-razor-shop-vintage-barbershop-shaving-219675564.jpg
                                @endif
                                ">
                                <br><br>
                        <button class="btn btn-warning btn-md" data-bs-toggle="modal" data-bs-target="#book{{$barber->id}}">Pilih</button>
                    </div>
                    <br>
                    <p class="price" style="color:; font-family: 'Trebuchet MS', sans-serif;">Rp. {{$barber->rate}}-</p>
                </div>




                <div class="modal fade" id="book{{$barber->id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="booking text-center px-4">
                                    <img src="./assets/images/Jupiter.png" alt="" width="150px">
                                    <h3 class="fw-bold">BOOKING</h3>
                                    <form class="text-start" method="POST" action="{{route('service.artist-logic')}}">
                                        @csrf
                                        <input type="text" class="form-control" id="barber_id" name="barber_id" aria-describedby="barber_id" value="{{$barber->id}}" readonly hidden>
                                        <input type="text" class="form-control" id="price" name="price" aria-describedby="price" value="{{$barber->rate}}" readonly hidden>
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{Auth::guard('web')->user()->name}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="location" class="form-label fw-bold">Lokasi</label>
                                            <input type="location" class="form-control" id="address" name="address" aria-describedby="address" value="{{Auth::guard('web')->user()->address}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="time" class="form-label fw-bold">Waktu</label>
                                            <input type="datetime-local" class="form-control" id="date" name="date" aria-describedby="date" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-brown">BOOK</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><br><br><br><br>
</section>


{{-- @include('components.modal.book') --}}
@include('templates.footer')