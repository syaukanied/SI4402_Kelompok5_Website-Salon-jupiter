@extends('layouts.base')

@section('main')
    <style>
        .my-category {
            padding: 50px 100px;
            min-height: 550px;
            height: 80vh;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .categories {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .category {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .category img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
        }

        .category .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="{{route('adminservice')}}">Back</a>
                </div>
            </div>
            <div class="my-category card col-10">
                <div class="manage-service mb-3">
                    <a href="{{route('adminservice-category-add', request()->service->id)}}">
                        <button class="btn btn-outline-success">
                            <div class="fas fa-plus"></div> Add New Category
                        </button>
                    </a>
                </div>
                <article class="categories">
                    @foreach ($service_categories as $service_category)
                        <div class="category">
                            <h6 class="fw-bold">{{$service_category->name}}</h6>
                            <img src="
                                @if ($service_category->image != null)
                                    {{asset($service_category->image)}}
                                @else
                                    https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png
                                @endif
                            " alt="">
                            <div class="mt-4 d-flex gap-2">
                                <a href="{{route('adminservice-category-detail', ['service' => $service_category->service->id, 'service_category' => $service_category->id])}}">
                                    <button class="btn btn-outline-primary">
                                        <div class="fas fa-edit"></div>
                                    </button>
                                </a>
                                <a class="w-100" href="{{route('adminservice-sub-category', ['service' => $service_category->service->id, 'service_category' => $service_category->id])}}">
                                    <button class="btn btn-brown">Sub Category</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
    </div>
@endsection
