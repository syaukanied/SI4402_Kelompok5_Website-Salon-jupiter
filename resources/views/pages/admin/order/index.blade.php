@extends('layouts.base')


@section('main')
    <style>
        .my-order {
            padding: 50px 100px;
            height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .orders {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .order {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .order .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            @include('layouts.admin.sidebar')
            <div class="my-order card col-10">
                <article class="orders">
                    @foreach ($orders as $order)
                        <div class="card order">
                            <h3 class="fw-bold fs-4">{{$order->name}}</h3>
                            <h5 class="text-secondary fs-6">{{$order->readable_date}} <br>{{$order->address}}</h5>
                            <h5 class="text-secondary fs-6">Status : {{$order->is_finish ? 'Complete' : 'Pending'}}</h5>
                            <div class="mt-4">
                                <a href="/admin/order/{{$order->id}}/detail">
                                    <button class="btn btn-brown">Details</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
@endsection
