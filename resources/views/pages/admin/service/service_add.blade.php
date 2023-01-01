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

        .service .add-form .form-control,
        .service .add-form .form-select {
            font-size: 20px;
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
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="{{route('adminservice')}}">Back</a>
                </div>
            </div>
            <div class="my-service card col-10">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                <article class="service">
                    <h1 class="fw-bold">Add New Service</h1>
                    <form class="add-form mt-4" action="{{route('adminlogic-add-service')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Service name" required>
                        </div>
                        <div class="mt-4">
                            <input class="form-control" type="file" name="image" id="image" accept=".png,.jpg,.jpeg">
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
