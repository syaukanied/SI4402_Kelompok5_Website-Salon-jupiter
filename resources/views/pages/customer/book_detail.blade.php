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

    .booking {
        min-height: 100vh;
        padding: 50px;
        overflow: hidden;
        position: relative;
    }

    .booking .bg {
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
        opacity: 0.4;
    }

    .booking .card {
        border-radius: 15px;
        box-shadow: 0px 0px 22px #0000004b;
        padding: 20px;

    }

    .form-control,
    .form-select {
        border: 1px solid #F4926B;
        font-size: 20px;
        border-radius: 15px;
    }

    .form-control[readonly] {
        background-color: white
    }

    .btn.btn-brown {
        padding: 10px 50px;
    }

</style>
<!-- <div class="btn-back mt-4 ms-4">
    <a href="{{ url()->previous() }}">
        <img style="cursor: pointer;" src="{{ asset('/assets/images/back-button.png') }}">
    </a>
</div> -->
@include('templates.navbar')
<br><br><br>
<section class="booking">
<br><br>
    <img class="bg" src="/assets/images/signup.svg" alt="">
    <div class="w-50 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center fw-bold">MY BOOKING</h3>
                <form action="{{route('service.order-logic')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="service" class="form-label fw-bold">Service</label>
                        <input type="text" class="form-control" id="service" aria-describedby="service" value="{{$order->service->name}}" readonly disabled>
                    </div>
                    @if ($order->service_category_id != null)
                        <div class="mb-3">
                            <label for="type" class="form-label fw-bold">Tipe</label>
                            <input type="text" class="form-control" id="type" aria-describedby="type" value="{{$order->service_category->name}}" readonly disabled>
                        </div>
                    @endif
                    @if ($order->service_sub_category_id != null)
                        <div class="mb-3">
                            <label for="type" class="form-label fw-bold">Catalog</label>
                            <input type="text" class="form-control" id="type" aria-describedby="type" value="{{$order->service_sub_category->name}}" readonly disabled>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="time" class="form-label fw-bold">Waktu</label>
                        <input type="datetime-local" class="form-control" id="time" aria-describedby="time" value="{{$order->date}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label fw-bold">Lokasi</label>
                        <input type="location" class="form-control" id="location" aria-describedby="location" value="{{$order->address}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="artist" class="form-label fw-bold">Artist</label>
                        <input type="artist" class="form-control" id="artist" aria-describedby="artist" value="{{$order->barber->name}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Harga</label>
                        <input type="location" class="form-control" id="price" aria-describedby="price" value="{{$order->price}}" readonly>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-danger" id="cancel" name="cancel" value="CANCEL">
                        <input type="submit" class="btn btn-success" id="order" name="order" value="ORDER">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <br><br>
</section>
@include('templates.footer')
