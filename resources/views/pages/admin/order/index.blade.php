@extends('layouts.base')


@section('main')
    <style>
        .my-order {
            padding: 50px 100px;
            height: 550px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
            overflow: auto;
        }

        .orders {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }

        .order {
            padding: 15px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.219);
            border-radius: 15px;
        }

        .order .btn {
            width: 100%;
            border-radius: 15px;
        }

    </style>
    @include('layouts.admin.navbar')
            @include('layouts.admin.sidebar')
    <!-- content start -->
                                <div class="container mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2>Waiting for Approval</h2><br>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Status</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Tipe</th>
                                                        <th>Lokasi</th>
                                                        <th>Waktu</th>
                                                        <th>Harga</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($idleOrders as $idleOrders)
                                                    <tr>
                                                        <td scope="row">
                                                            <button type="button" class="btn btn-info btn-sm py-0" style="font-size: 0.8em; cursor:default;">Waiting</button>
                                                        </td>
                                                        <td>{{$idleOrders->user->name}}</td>
                                                        <td>{{$idleOrders->service->name}}</td>
                                                        <td>{{$idleOrders->service_category->name}}</td>
                                                        <td>{{$idleOrders->address}}</td>
                                                        <td>{{$idleOrders->date}}</td>
                                                        <td>{{$idleOrders->price}}</td>
                                                        <td>
                                                            <form method="POST" action="{{route('storeApproval')}}">
                                                            @csrf
                                                                <input type="hidden" name="id" value="{{$idleOrders->id}}" readonly>
                                                                <input type="hidden" id="status{{$idleOrders->id}}" name="status" readonly>
                                                                <button type="submit" value="1" onclick='document.getElementById("status{{$idleOrders->id}}").value = "1"' class="btn btn-success btn-sm py-0" style="font-size: 0.8em;">Approve</button>
                                                                <button type="submit" value="2" onclick='document.getElementById("status{{$idleOrders->id}}").value = "2"' class="btn btn-danger btn-sm py-0" style="font-size: 0.8em;">Reject</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2>Orders</h2><br>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Status</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Tipe</th>
                                                        <th>Lokasi</th>
                                                        <th>Waktu</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                    @foreach($orders as $orders)
                                                    <tr>
                                                        @if($orders->status == '1')
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-sm py-0" style="font-size: 0.8em; cursor:default;">Approved</button>
                                                        </td>
                                                        @elseif($orders->status == '2')
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm py-0" style="font-size: 0.8em; cursor:default;">Rejected</button>
                                                        </td>
                                                        @endif
                                                        <td>{{$orders->user->name}}</td>
                                                        <td>{{$orders->service->name}}</td>
                                                        <td>{{$orders->service_category->name}}</td>
                                                        <td>{{$orders->address}}</td>
                                                        <td>{{$orders->date}}</td>
                                                        <td>{{$orders->price}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
