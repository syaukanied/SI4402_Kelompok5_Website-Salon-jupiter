@extends('layouts.base')

@section('main')
    <style>
        .my-service {
            padding: 50px 100px;
            min-height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .service .edit-form .form-control,
        .service .edit-form .form-select {
            font-size: 20px;
            border-radius: 15px;
        }

        .service .btn {
            width: 100%;
            border-radius: 15px;
        }

        .service .current-image {
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
                    <a href="{{route('adminservice')}}">Back</a>
                </div>
            </div>
            <div class="my-service card col-10">
                <article class="service">
                    <h1 class="fw-bold">My Service</h1>
                    <div class="text-right">
                        <form action="{{route('adminlogic-delete-service', $service->id)}}" method="post">
                            @csrf
                            <div class="col-3 ms-auto">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <form class="edit-form mt-4" action="{{route('adminlogic-update-service', $service->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" value="{{$service->name}}" aria-describedby="name" placeholder="Service name" required>
                        </div>
                        <div class="mt-4">
                            <h5>Current</h5>
                            <img class="current-image" src="
                                @if ($service->image != null)
                                    {{asset($service->image)}}
                                @else
                                    https://www.btklsby.go.id/images/placeholder/basic.png
                                @endif
                            " alt="">
                            <h5>Change</h5>
                            <input class="form-control" type="file" name="image" id="image" accept=".png,.jpg,.jpeg">
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
