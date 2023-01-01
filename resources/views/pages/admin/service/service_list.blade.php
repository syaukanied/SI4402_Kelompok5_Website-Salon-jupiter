@extends('layouts.base')

@section('main')
    <style>
        .my-service {
            padding: 50px 100px;
            min-height: 550px;
            height: 80vh;
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

        .service img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px
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
                <div class="manage-service mb-3">
                    <a href="{{route('adminservice-add')}}">
                        <button class="btn btn-outline-success">
                            <i class="fas fa-plus"></i> Add New Service
                        </button>
                    </a>
                </div>
                <article class="services">
                    @foreach ($services as $service)
                        <div class="service">
                            <h6 class="fw-bold">{{$service->name}}</h6>
                            <img src="
                                @if ($service->image != null)
                                    {{asset($service->image)}}
                                @else
                                    https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png
                                @endif
                            " alt="">
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{route('adminservice-detail', $service->id)}}">
                                    <button class="btn btn-outline-primary">
                                        <div class="fas fa-edit"></div>
                                    </button>
                                </a>
                                <a class="w-100" href="{{route('adminservice-category', $service->id)}}">
                                    <button class="btn btn-brown">Category</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
@endsection
