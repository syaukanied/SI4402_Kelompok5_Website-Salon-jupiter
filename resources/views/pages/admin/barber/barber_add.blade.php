@extends('layouts.base')

@section('main')
    <style>
        .my-barber {
            padding: 50px 100px;
            min-height: 550px;
            height: 80vh;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .barber .add-form .form-control,
        .barber .add-form .form-select {
            font-size: 20px;
            border-radius: 15px;
        }

        .barber .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="col-2 nav-item">
                <div class="nav-link active">
                    <a href="/admin/barber">Back</a>
                </div>
            </div>
            <div class="my-barber card col-10">
                <article class="barber">
                    <h1 class="fw-bold">Add Beautician</h1>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    <form class="add-form mt-4" action="{{route('adminlogic-add-barber')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" required>
                        </div>
                        <div class="mt-4">
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="Name" placeholder="Name" required>
                        </div>
                        <div class="mt-4">
                            <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_number" placeholder="Phone Number" required>
                        </div>
                        <div class="mt-4">
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Password" required>
                        </div>
                        <div class="mt-4">
                            <input type="number" class="form-control" id="rate" name="rate" aria-describedby="rate" placeholder="Rate" required>
                        </div>
                        <div class="mt-4">
                            <input class="form-control" type="file" id="image" name="image" accept=".png,.jpg,.jpeg" required>
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
