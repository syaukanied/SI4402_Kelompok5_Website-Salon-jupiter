@extends('layouts.base')

@section('main')
    <style>
        .my-order {
            padding: 20px 50px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .my-order .form-control,
        .my-order .form-select {
            border: 1px solid #F4926B;
            font-size: 20px;
            border-radius: 15px;
        }

        .my-order .form-label {
            font-weight: bold;
        }

        .my-order .form-control[readonly] {
            background-color: white
        }

        .my-order form .btn {
            padding: 10px 100px;
            border-radius: 15px
        }

        .nav-item .nav-link a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .nav-link.active a {
            color: #F4926B;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="/admin/order">Back</a>
                </div>
            </div>
            <div class="my-order card col-10">
                <article class="w-100">
                    <form class="w-100" method="POST" action="{{ route('adminlogic-order-detail-finish', $order->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Service</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $order->service->name }}" readonly required>
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
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $order->name }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $order->user->phone_number }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Waktu</label>
                            <input type="text" class="form-control" id="time" aria-describedby="time" value="{{ $order->readable_date }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="address" aria-describedby="address" value="{{ $order->address }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="price" aria-describedby="price" value="{{ $order->price }}" readonly required>
                        </div>
                        @if ($order->is_finish == false)
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-success">Set Finish</button>
                            </div>
                        @endif

                    </form>
                </article>
            </div>
        </div>
    </div>
@endsection
