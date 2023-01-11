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

        .barbers {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .barber {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .barber h6 {
            text-align: center;
        }

        .barber img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px
        }

        .barber .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
    <!-- <div class="container py-5">
        <div class="row"> -->
            @include('layouts.admin.sidebar')
            <!-- <div class="my-barber card col-10"> -->
                <div class="manage-barber mb-3">
                    <a href="{{route('adminbarber-add')}}">
                        <button class="btn btn-outline-success">
                            <i class="fas fa-plus"></i> Add Beautician
                        </button>
                    </a>
                </div>
                <article class="barbers">
                    @foreach ($barbers as $barber)
                        <div class="barber">
                            <h6 class="fw-bold">{{$barber->name}}</h6>
                            <img src="
                            @if ($barber->image != null)
                                {{asset($barber->image)}}
                            @else
                                https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png
                            @endif
                            " alt="">
                            <p class="my-2 text-success text-center">$ {{$barber->rate}}</p>
                            <div class="mt-4">
                                <a href="{{route('adminbarber-detail', $barber->id)}}">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fw fa-edit"></i> Manage
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </article>
            <!-- </div> -->
        </div>
    </div>
    </div>
@endsection
