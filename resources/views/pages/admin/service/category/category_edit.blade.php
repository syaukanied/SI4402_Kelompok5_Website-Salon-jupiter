@extends('layouts.base')

@section('main')
    <style>
        .my-category {
            padding: 50px 100px;
            min-height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .category .edit-form .form-control,
        .category .edit-form .form-select {
            font-size: 20px;
            border-radius: 15px;
        }

        .category .btn {
            width: 100%;
            border-radius: 15px;
        }

        .category .current-image {
            width: 250px;
            height: 350px;
            object-fit: cover;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="{{route('adminservice-category', ['service' => $service->id])}}">Back</a>
                </div>
            </div>
            <div class="my-category card col-10">
                <article class="category">
                    <h1 class="fw-bold">My Category</h1>
                    <div class="text-right">
                        <form action="{{route('adminlogic-delete-service-category', ['service' => $service->id, 'service_category' => $service_category->id])}}" method="post">
                            @csrf
                            <div class="col-3 ms-auto">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                    <form class="edit-form mt-4" action="{{route('adminlogic-update-service-category', ['service' => $service->id, 'service_category'=>$service_category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Category name" value="{{$service_category->name}}" required>
                        </div>
                        <div class="mt-4">
                            <h5>Current</h5>
                            <img class="current-image" src="
                                @if ($service_category->image != null)
                                    {{asset($service_category->image)}}
                                @else
                                    https://www.btklsby.go.id/images/placeholder/basic.png
                                @endif
                            " alt="">
                            <h5>Change</h5>
                            <input class="form-control" type="file" id="image" accept=".png,.jpg,.jpeg"  name="image">
                        </div>
                        <div class=" mt-4 text-right">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
@endsection
