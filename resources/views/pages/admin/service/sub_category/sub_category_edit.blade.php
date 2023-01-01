@extends('layouts.base')

@section('main')
    <style>
        .my-sub-category {
            padding: 50px 100px;
            min-height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .sub-category .add-form .form-control,
        .sub-category .add-form .form-select {
            font-size: 20px;
            border-radius: 15px;
        }

        .sub-category .btn {
            width: 100%;
            border-radius: 15px;
        }

        .sub-category .current-image {
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
                    <a href="{{route('adminservice-sub-category', ['service' => request()->service->id, 'service_category' => request()->service_category->id])}}">Back</a>
                </div>
            </div>
            <div class="my-sub-category card col-10">
                <article class="sub-category">
                    <h1 class="fw-bold">My Sub Category</h1>
                    <div class="text-right">
                        <form action="{{route('adminlogic-delete-service-sub-category', ['service' => request()->service->id, 'service_category'=>request()->service_category->id, 'service_sub_category'=>$service_sub_category->id])}}" method="post" >
                            @csrf
                            <div class="col-3 ms-auto">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <form class="add-form mt-4" action="{{route('adminlogic-update-service-sub-category', ['service' => request()->service->id, 'service_category'=>request()->service_category->id, 'service_sub_category'=>$service_sub_category->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{$service_sub_category->name}}" placeholder="Sub Category name" required>
                        </div>
                        <div class="mt-4">
                            <h5>Current</h5>
                            <img class="current-image" src="
                                @if ($service_sub_category->image != null)
                                    {{asset($service_sub_category->image)}}
                                @else
                                    https://www.btklsby.go.id/images/placeholder/basic.png
                                @endif
                            " alt="">
                            <h5>Change</h5>
                            <input class="form-control" type="file" id="image" name="image" accept=".png,.jpg,.jpeg">
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
