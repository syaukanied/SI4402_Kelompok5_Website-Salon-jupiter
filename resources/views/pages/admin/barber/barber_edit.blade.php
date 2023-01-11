@extends('layouts.base')

@section('main')
    <style>
        .my-barber {
            padding: 50px 100px;
            min-height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .barber .edit-form .form-control,
        .barber .edit-form .form-select {
            font-size: 20px;
            border-radius: 15px;
        }

        .barber .btn {
            width: 100%;
            border-radius: 15px;
        }

        .barber .current-image {
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
                    <a href="/admin/barbers">Back</a>
                </div>
            </div>
            <div class="my-barber card col-10">
                <article class="barber">
                    <h1 class="fw-bold">My Barber</h1>
                    <div class="text-right">
                        <form action="{{route('adminlogic-delete-barber', $barber->id)}}" method="post">
                            @csrf
                            <div class="col-3 ms-auto">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
                            </div>
                        </form>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <form class="edit-form mt-4" action="{{route('adminlogic-update-barber', $barber->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" readonly disabled value="{{$barber->email}}">
                        </div>
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="Name" placeholder="Name" value="{{$barber->name}}" required>
                        </div>
                        <div class="mt-4">
                            <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_number" placeholder="Phone Number" value="{{$barber->phone_number}}" required>
                        </div>
                        <div class="mt-4">
                            <input type="password" class="form-control" id="new_password" name="new_password" aria-describedby="new_password" placeholder="New Password" >
                        </div>
                        <div class="mt-4">
                            <input type="number" class="form-control" id="rate" name="rate" aria-describedby="rate" placeholder="Rate" value="{{$barber->rate}}" required>
                        </div>
                        <div class="mt-4">
                            <h5 class="mb-2">Current Image</h5>
                            <img class="current-image mb-2" src="{{asset($barber->image)}}" alt="https://www.btklsby.go.id/images/placeholder/basic.png">
                            <h5 class="mb-2">Change Image</h5>
                            <input class="form-control" type="file" name="image" id="image" accept=".png,.jpg,.jpeg">
                        </div>
                        <div class=" mt-4 text-right">
                            <button type="submit" class="btn btn-outline-success">Edit</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
@endsection
