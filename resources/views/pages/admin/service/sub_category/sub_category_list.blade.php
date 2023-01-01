@extends('layouts.base')

@section('main')
    <style>
        .my-sub-category {
            padding: 50px 100px;
            min-height: 550px;
            height: 80vh;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .sub-categories {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .sub-category {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .sub-category img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px
        }

        .sub-category .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="{{route('adminservice-category', ['service' => request()->service->id])}}">Back</a>
                </div>
            </div>
            <div class="my-sub-category card col-10">
                <div class="manage-sub-category mb-3">
                    <a href="{{route('adminlogic-add-service-sub-category', ['service' => request()->service->id, 'service_category' => request()->service_category->id])}}">
                        <button class="btn btn-outline-success">
                            <div class="fas fa-plus"></div> Add New sub-category
                        </button>
                    </a>
                </div>
                <article class="sub-categories">
                    @foreach ($service_sub_categories as $service_sub_category)
                        <div class="sub-category">
                            <h6 class="fw-bold">{{$service_sub_category->name}}</h6>
                            <img src="
                                @if ($service_sub_category->image != null)
                                    {{asset($service_sub_category->image)}}
                                @else
                                    https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png
                                @endif
                            " alt="">
                            <div class="mt-4">
                                <a href="{{route('adminservice-sub-category-detail', ['service' => request()->service->id, 'service_category' => request()->service_category->id, 'service_sub_category' => $service_sub_category->id])}}">
                                    <button class="btn btn-outline-primary">
                                        <div class="fas fa-edit"></div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
@endsection
