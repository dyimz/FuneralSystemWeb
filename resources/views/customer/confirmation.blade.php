@extends('layouts.landing.master')

@section('title')
   cart
@endsection

@section('content')
<section class="section-py bg-body first-section-pt">
    <div class="container" >
        <div id="wizard-checkout" class="wizard-icons wizard-icons-example mb-5" style="background-color: white; border-radius: 10px;">
            <div class="bs-stepper-content border-top">
                <div id="checkout-confirmation" class="content">

                    <div class="row mb-3">
                        <div class="col-12 col-lg-8 mx-auto text-center mb-3">
                        <h4 class="mt-2">Thank You! 😇</h4>
                        <p>Your order <a href="javascript:void(0)">#{{$order->id}}</a> has been placed!</p>
                        <p>We sent an email to <a href="mailto:john.doe@example.com">{{auth()->user()->email}}</a> with your order confirmation and receipt. If the email hasn't arrived within two minutes, please check your spam folder to see if the email was routed there.</p>
                        <p><span class="fw-medium"><i class="bx bx-time-five me-1"></i> Time placed:&nbsp;</span> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:iA') }}</p>
                        </div>
                        <!-- Confirmation details -->
                        <div class="col-12">
                        <ul class="list-group list-group-horizontal-md">
                            <li class="list-group-item flex-fill p-4 text-heading">
                                <h6 class="d-flex align-items-center gap-1"><i class="bx bx-map"></i> Shipping</h6>
                                <address class="mb-0">
                                    {{auth()->user()->customer->fname}} {{auth()->user()->customer->lname}}<br />
                                    {{$order->address}}<br />
                                </address>
                                <p class="mb-0 mt-3">
                                    {{$order->contact}}
                                </p>
                            </li>
                            <li class="list-group-item flex-fill p-4 text-heading">
                                <h6 class="d-flex align-items-center gap-1"><i class="bx bx-credit-card"></i> Billing Information</h6>
                                <address class="mb-0">
                                    {{auth()->user()->customer->fname}} {{auth()->user()->customer->lname}}<br />
                                    @if($order->MOP = 'CASH')
                                        Cash on Delivery<br />
                                    @else
                                        Gcash Payment<br />
                                    @endif
                                </address>
                                <p class="mb-0 mt-3">
                                    {{$order->contact}}
                                </p>
                            </li>
                            <li class="list-group-item flex-fill p-4 text-heading">
                                <h6 class="d-flex align-items-center gap-1"><i class="bx bxs-ship"></i> Shipping Information</h6>
                                Standard Delivery<br />
                                (Normally 5-7 business days)
                            </li>
                        </ul>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Confirmation items -->
                        <div class="col-xl-9 mb-3 mb-xl-0">
                        <ul class="list-group">
                            @foreach($order->products as $product)
                            <li class="list-group-item p-4">
                                <div class="d-flex gap-3">

                                    <div class="flex-shrink-0">
                                        <img src="{{asset($product->img)}}" alt="google home" class="w-px-75">
                                    </div>

                                    <div class="flex-grow-1">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <a href="javascript:void(0)" class="text-body">
                                                    <p>{{$product->name}}</p>
                                                </a>
                                                <div class="text-muted mb-1 d-flex flex-wrap">
                                                    <span class="me-1">Category:</span> 
                                                    <a href="javascript:void(0)" class="me-3">{{$product->category}}</a> 
                                                    <span class="badge bg-label-success">In Stock</span>
                                                </div>
                                                <div class="text-muted mb-1 d-flex flex-wrap">
                                                    <span class="me-1">Price:</span> 
                                                    <a href="javascript:void(0)" class="me-3">{{$product->price}}</a> 
                                                </div>
                                                <div class="text-muted mb-1 d-flex flex-wrap">
                                                    <span class="me-1">Quantity:</span> 
                                                    <a href="javascript:void(0)" class="me-3">{{$product->pivot->quantity}}</a> 
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="text-md-end">
                                                    <div class="my-2 my-lg-4"><span class="text-primary">₱ {{$product->price * $product->pivot->quantity}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                        <!-- Confirmation total -->
                        <div class="col-xl-3">
                            <div class="border rounded p-4 pb-3">
                                <!-- Price Details -->
                                <h6>Price Details</h6>
                                <dl class="row mb-0">

                                <dt class="col-6 fw-normal">Order Total</dt>
                                <dd class="col-6 text-end">₱ {{$order->total_price - 50}}</dd>

                                <dt class="col-sm-6 fw-normal">Delivery Charges</dt>
                                <dd class="col-sm-6 text-end">₱ 50</dd>
                                </dl>
                                <hr class="mx-n4">
                                <dl class="row mb-0">
                                <dt class="col-6">Total</dt>
                                <dd class="col-6 fw-medium text-end mb-0">₱ {{$order->total_price}}</dd>
                                </dl>
                            </div>
                            <div class="d-grid pt-3">
                                <a href="{{ route('customer.products') }}" type="button" class="btn btn-label-primary btn-prev">Back to Shop</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection