@extends('layouts.base')

@section('main')
    <style>
        .my-service {
            padding: 50px 100px;
            height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .services {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .service {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .service .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            @include('layouts.admin.sidebar')
            <div class="my-service card col-10">
                <article class="services">
                    <div class="service">
                        <h3 class="fw-bold fs-4">Service Name</h3>
                        <h5 class="text-secondary fs-6">Description</h5>
                        <div class="mt-4">
                            <a href="/admin/service/detail">
                                <button class="btn btn-brown">Details</button>
                            </a>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
@endsection
