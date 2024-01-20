
@extends('layouts.landing.master')

@section('title')
   Profile
@endsection'



@section('content')

@if(session('reload'))
    <script>
        location.reload(true);
    </script>
@endif

<div class="container">
    <div class="layout-page">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

                @include('customer.profile.profileHeader')

                <div class="row">

                    @include('customer.profile.aboutUser')

                    <!-- Show Order -->
                    <div class="col-xl-8 col-lg-7 col-md-7">
       
                        <div class="card mb-4">
                            <h5 class="card-header">Order #{{$order->id}}</h5>
                            <div class="card-body">

                            <div class="row">
                                <div class="col-xl-7 col-12">
                                    <dl class="row mb-0">
                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Address:</dt>
                                    <dd class="col-sm-8">{{$order->address}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Contact:</dt>
                                    <dd class="col-sm-8">{{$order->contact}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Discounted:</dt>
                                    <dd class="col-sm-8">{{$order->discounted}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Subtotal:</dt>
                                    <dd class="col-sm-8">{{$order->subtotal}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Total:</dt>
                                    <dd class="col-sm-8">{{$order->total_price}}</dd>
                                    </dl>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <dl class="row mb-0">
                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Payment Mtd:</dt>
                                    <dd class="col-sm-8">{{$order->MOP}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Status:</dt>
                                    <dd class="col-sm-8">{{$order->status}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Type:</dt>
                                    <dd class="col-sm-8">{{$order->type}}</dd>

                                    <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Payed:</dt>
                                    <dd class="col-sm-8">{{$order->paymentstatus}}</dd>

                                    @if($order->type == 'PACKAGE')
                                        <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Package:</dt>
                                        <dd class="col-sm-8">{{$order->package->name}}</dd>
                                    @endif

                                    </dl>
                                </div>
                            </div>

                            <div class="table-responsive">
                            <table class="table border-top">
                                <thead>
                                <tr>
                                    <th class="text-truncate">Products/Services</th>
                                    <th class="text-truncate">Price</th>
                                    <th class="text-truncate">QTY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->type == 'PACKAGE')
                                    @foreach($order->package->services as $service)
                                    <tr>
                                    <td class="text-truncate"><span class="fw-medium">{{$service->name}}</span></td>
                                    <td class="text-truncate">{{$service->price}}</td>
                                    <td class="text-truncate">1</td>
                                    </tr>
                                    @endforeach
                                @endif

                                @if($order->type == 'PRODUCTS')
                                    @foreach($order->products as $product)
                                    <tr>
                                    <td class="text-truncate"><span class="fw-medium">{{$product->name}}</span></td>
                                    <td class="text-truncate">{{$product->price}}</td>
                                    <td class="text-truncate">{{$product->pivot->quantity}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            </div>

                            <div class="mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Back</a>
                            </div>

                        </div>

                        </div>
                    </div>
                    <!-- /Show Order -->      

                </div>

            </div>
       
        </div>
    </div>
</div>


@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection