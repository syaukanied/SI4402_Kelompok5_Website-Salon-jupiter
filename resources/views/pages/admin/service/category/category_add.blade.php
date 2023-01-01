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

        .category .add-form .form-control,
        .category .add-form .form-select {
            font-size: 20px;
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
                    <a href="{{route('adminservice-category', request()->service->id)}}">Back</a>
                </div>
            </div>
            <div class="my-category card col-10">
                <article class="category">
                    <h1 class="fw-bold">Add New Category</h1>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <form class="add-form mt-4" action="{{route('adminlogic-add-service-category', request()->service->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Category name" required>
                        </div>
                        <div class="mt-4">
                            <input class="form-control" type="file" id="image" name="image" accept=".png,.jpg,.jpeg">
                        </div>
                        <div class=" mt-4 text-right">
                            <button type="submit" class="btn btn-outline-success">Add</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
@endsection
