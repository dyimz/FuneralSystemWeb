@extends('layouts.landing.master')

@section('title')
   Checkout
@endsection

@section('content')


<section class="section-py bg-body first-section-pt">
  <div class="container">
    <!--/ Checkout Wizard -->
    <!-- Checkout Wizard -->
    <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example mb-5">
    <div class="bs-stepper-header m-auto border-0 py-4">
      <div class="step" data-target="#checkout-cart">
        <button type="button" class="step-trigger" disabled>
          <span class="bs-stepper-icon">
            <svg xmlns="http://www.w3.org/2000/svg" id="wizardCart" width="54" height="54">
              <g fill-rule="nonzero">
                  <path d="M57.927 34.29V16.765a4 4 0 0 0-4-4h-4.836a.98.98 0 1 0 0 1.963h3.873a3 3 0 0 1 3 3v15.6a3 3 0 0 1-3 3H14.8a4 4 0 0 1-4-4v-14.6a3 3 0 0 1 3-3h3.873a.98.98 0 1 0 0-1.963H10.8V4.909a.98.98 0 0 0-.982-.982H7.715C7.276 2.24 5.752.982 3.927.982A3.931 3.931 0 0 0 0 4.909a3.931 3.931 0 0 0 3.927 3.927c1.825 0 3.35-1.256 3.788-2.945h1.121v38.29a.98.98 0 0 0 .982.983h6.903c-1.202.895-1.994 2.316-1.994 3.927A4.915 4.915 0 0 0 19.637 54a4.915 4.915 0 0 0 4.908-4.91c0-1.61-.79-3.03-1.994-3.926h17.734c-1.203.895-1.994 2.316-1.994 3.927A4.915 4.915 0 0 0 43.2 54a4.915 4.915 0 0 0 4.91-4.91c0-1.61-.792-3.03-1.995-3.926h5.921a.98.98 0 1 0 0-1.964H10.8v-4.91h43.127a4 4 0 0 0 4-4zm-54-27.417a1.966 1.966 0 0 1-1.963-1.964c0-1.083.88-1.964 1.963-1.964.724 0 1.35.398 1.691.982h-.709a.98.98 0 1 0 0 1.964h.709c-.34.584-.967.982-1.69.982zm15.71 45.163a2.949 2.949 0 0 1-2.946-2.945 2.949 2.949 0 0 1 2.945-2.946 2.95 2.95 0 0 1 2.946 2.946 2.949 2.949 0 0 1-2.946 2.945zm23.563 0a2.949 2.949 0 0 1-2.945-2.945 2.949 2.949 0 0 1 2.945-2.946 2.949 2.949 0 0 1 2.945 2.946 2.949 2.949 0 0 1-2.945 2.945z"/>
                  <path d="M33.382 27.49c7.58 0 13.745-6.165 13.745-13.745C47.127 6.165 40.961 0 33.382 0c-7.58 0-13.746 6.166-13.746 13.745 0 7.58 6.166 13.746 13.746 13.746zm0-25.526c6.497 0 11.782 5.285 11.782 11.781 0 6.497-5.285 11.782-11.782 11.782S21.6 20.242 21.6 13.745c0-6.496 5.285-11.781 11.782-11.781z"/>
                  <path d="M31.77 19.41c.064.052.136.083.208.117.03.015.056.039.086.05a.982.982 0 0 0 .736-.027c.049-.023.085-.066.13-.095.07-.046.145-.083.202-.149l.02-.021.001-.001.001-.002 7.832-8.812a.98.98 0 1 0-1.467-1.304l-7.222 8.126-5.16-4.3a.983.983 0 0 0-1.258 1.508l5.892 4.91z"/>
              </g>
            </svg>
          </span>
          <span class="bs-stepper-label">Cart</span>
        </button>
      </div>
      <div class="line">
        <i class="bx bx-chevron-right"></i>
      </div>
      <div class="step" data-target="#checkout-address">
        <button type="button" class="step-trigger" disabled>
          <span class="bs-stepper-icon">
            <svg xmlns="http://www.w3.org/2000/svg" id="wizardCheckoutAddress" width="54" height="54">
              <g fill-rule="nonzero">
                  <path d="M54 7.2V4a4 4 0 0 0-4-4H4a4 4 0 0 0-4 4v3.2h1.8v36H.9a.9.9 0 1 0 0 1.8h25.2v1.8c0 .042.019.08.024.12A3.596 3.596 0 0 0 23.4 50.4c0 1.985 1.615 3.6 3.6 3.6s3.6-1.615 3.6-3.6a3.596 3.596 0 0 0-2.724-3.48c.005-.04.024-.078.024-.12V45h25.2a.9.9 0 1 0 0-1.8h-.9v-36H54zM28.8 50.4c0 .993-.807 1.8-1.8 1.8s-1.8-.807-1.8-1.8.807-1.8 1.8-1.8 1.8.807 1.8 1.8zM5.4 1.8h43.2a3.6 3.6 0 0 1 3.6 3.6H1.8a3.6 3.6 0 0 1 3.6-3.6zm43 41.4H5.6a2 2 0 0 1-2-2v-32a2 2 0 0 1 2-2h42.8a2 2 0 0 1 2 2v32a2 2 0 0 1-2 2z"/>
                  <path d="M45 36.9H31.5a.9.9 0 1 0 0 1.8H45a.9.9 0 1 0 0-1.8zM9 32.4h9a.9.9 0 1 0 0-1.8H9a.9.9 0 1 0 0 1.8zM27 32.4h13.5a.9.9 0 1 0 0-1.8H27a.9.9 0 1 0 0 1.8zM21.861 30.861a.926.926 0 0 0-.261.639c0 .234.099.468.261.639a.946.946 0 0 0 .639.261.946.946 0 0 0 .639-.261.946.946 0 0 0 .261-.639.945.945 0 0 0-.261-.639c-.333-.333-.945-.333-1.278 0zM27 36.9H13.5a.9.9 0 1 0 0 1.8H27a.9.9 0 1 0 0-1.8zM9 38.7a.946.946 0 0 0 .639-.261.946.946 0 0 0 .261-.639.906.906 0 0 0-.261-.63c-.333-.342-.936-.342-1.278-.009a.945.945 0 0 0-.261.639c0 .234.099.468.261.639A.946.946 0 0 0 9 38.7zM44.361 30.861a.926.926 0 0 0-.261.639c0 .234.099.468.261.639A.946.946 0 0 0 45 32.4a.946.946 0 0 0 .639-.261.946.946 0 0 0 .261-.639.945.945 0 0 0-.261-.639c-.333-.333-.936-.333-1.278 0zM45 18H31.5a.9.9 0 1 0 0 1.8H45a.9.9 0 1 0 0-1.8zM45 24.3h-9a.9.9 0 1 0 0 1.8h9a.9.9 0 1 0 0-1.8zM27 26.1h1.8a.9.9 0 1 0 0-1.8H27a.9.9 0 1 0 0 1.8zM27 13.5h13.5a.9.9 0 1 0 0-1.8H27a.9.9 0 1 0 0 1.8zM45 13.5a.946.946 0 0 0 .639-.261.906.906 0 0 0 .261-.639.905.905 0 0 0-.261-.639c-.342-.333-.945-.333-1.278 0a.945.945 0 0 0-.261.639c0 .234.099.468.261.639A.946.946 0 0 0 45 13.5zM27.261 18.261A.926.926 0 0 0 27 18.9c0 .234.099.468.261.639a.946.946 0 0 0 .639.261.946.946 0 0 0 .639-.261.946.946 0 0 0 .261-.639.926.926 0 0 0-.261-.639.942.942 0 0 0-1.278 0zM31.761 24.561a.945.945 0 0 0-.261.639c0 .234.099.468.261.639a.946.946 0 0 0 .639.261.946.946 0 0 0 .639-.261.946.946 0 0 0 .261-.639.945.945 0 0 0-.261-.639c-.333-.333-.945-.333-1.278 0zM22.5 11.7H8.1v14.4h14.4V11.7zm-1.8 12.6H9.9V13.5h10.8v10.8z"/>
              </g>
            </svg>
          </span>
          <span class="bs-stepper-label">Address</span>
        </button>
      </div>
      <div class="line">
        <i class="bx bx-chevron-right"></i>
      </div>
      <div class="step" data-target="#checkout-payment" >
        <button type="button" class="step-trigger" disabled>
          <span class="bs-stepper-icon">
            <svg xmlns="http://www.w3.org/2000/svg" id="wizardPayment" width="58" height="54">
              <g fill-rule="nonzero">
                  <path d="M8.679 23.143h7.714V13.5H8.679v9.643zm1.928-7.714h3.857v5.785h-3.857V15.43zM8.679 34.714h7.714v-9.643H8.679v9.643zM10.607 27h3.857v5.786h-3.857V27zM8.679 46.286h7.714v-9.643H8.679v9.643zm1.928-7.715h3.857v5.786h-3.857v-5.786zM34.714 22.179a.963.963 0 0 0-.964.964v8.678a.963.963 0 1 0 1.929 0v-8.678a.963.963 0 0 0-.965-.964zM34.714 34.714a.963.963 0 0 0-.964.965v8.678a.963.963 0 1 0 1.929 0V35.68a.963.963 0 0 0-.965-.965zM29.893 22.179a.963.963 0 0 0-.964.964v.964a.963.963 0 1 0 1.928 0v-.964a.963.963 0 0 0-.964-.964zM29.893 27a.963.963 0 0 0-.964.964v1.929a.963.963 0 1 0 1.928 0v-1.929a.963.963 0 0 0-.964-.964zM29.893 32.786a.963.963 0 0 0-.964.964v.964a.963.963 0 1 0 1.928 0v-.964a.963.963 0 0 0-.964-.964zM29.893 37.607a.963.963 0 0 0-.964.964V40.5a.963.963 0 1 0 1.928 0v-1.929a.963.963 0 0 0-.964-.964zM29.208 43.672c-.174.183-.28.434-.28.685 0 .26.106.502.28.685.182.173.434.28.685.28.25 0 .501-.107.684-.28a.996.996 0 0 0 .28-.685c0-.25-.106-.502-.28-.684a1 1 0 0 0-1.369 0z"/>
                  <path d="M42.286 0H4a4 4 0 0 0-4 4v2.75h2.893v43.184A4.071 4.071 0 0 0 6.959 54h32.367a4.071 4.071 0 0 0 4.067-4.066V6.75h2.893V4a4 4 0 0 0-4-4zm-.822 49.934a2.14 2.14 0 0 1-2.138 2.137H6.96a2.14 2.14 0 0 1-2.138-2.137V4.82H8.68v6.75h7.714v-6.75h8.678v11.326c0 1.199.976 2.174 2.175 2.174h9.151a2.177 2.177 0 0 0 2.174-2.174V4.821h2.893v45.113zM10.607 4.82h3.857v4.822h-3.857V4.82zm22.179 0V6.75h-1.929V4.821h1.929zm3.857 0v1.954c-.082-.01-.162-.025-.246-.025h-1.683V4.821h1.929zm-9.397 11.572a.246.246 0 0 1-.246-.246v-3.636c.082.01.162.025.246.025h1.683v3.857h-1.683zm3.611-3.857h1.683c.136 0 .246.11.246.246v3.365c0 .084.015.164.025.246h-1.954v-3.857zm3.857 3.611v-3.365a2.177 2.177 0 0 0-2.174-2.175h-5.294a.246.246 0 0 1-.246-.246V8.924c0-.135.11-.245.246-.245h9.151c.136 0 .246.11.246.245v7.223c0 .136-.11.246-.246.246H34.96a.246.246 0 0 1-.246-.246zM28.93 6.75h-1.683c-.084 0-.164.015-.246.025V4.821h1.929V6.75zm15.428-1.929h-.964V2.893h-40.5V4.82h-.964V2.93a1 1 0 0 1 1-1h40.428a1 1 0 0 1 1 1V4.82z"/>
                  <path d="m57.575 31.14-5.785-5.785a.965.965 0 0 0-1.365 0L44.64 31.14a.963.963 0 1 0 1.363 1.363l4.14-4.14v24.673a.963.963 0 1 0 1.928 0V28.363l4.14 4.14a.962.962 0 0 0 1.364 0 .963.963 0 0 0 0-1.363z"/>
              </g>
            </svg>
          </span>
          <span class="bs-stepper-label">Payment</span>
        </button>
      </div>



    </div>

    <div class="bs-stepper-content border-top">
      <form id="wizard-checkout-form" action="{{route('customer.order.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-xl-12 mb-3 mb-xl-0">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
          </div>
        </div>

        <!-- Cart -->
        <div id="checkout-cart" class="content">
          <div class="row">
            <!-- Cart left -->
            <div class="col-xl-8 mb-3 mb-xl-0">

              @if(session('success'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @php
                $user = auth()->user();
                $cart = $user->cart;
                $kart = session()->get('cart', []);
                $kart[$cart->id] = [
                    'id' => $cart->id,
                    'total_price' => $cart->total_price,
                    'items' => $cart->products,
                ];
                session()->put('cart', $kart);
              @endphp
              
              <!-- Shopping bag -->
              <h5>My Shopping Bag (
                @php
                  $cartKey = key(session('cart'));
                @endphp
                @if(session('cart'))
                  {{ count(session('cart')[$cartKey]['items']) }}
                @else
                  0
                @endif
                )</h5>
              <ul class="list-group mb-3">

                @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                    @foreach($details['items'] as $product)
                      <li class="list-group-item p-4">
                        <div class="d-flex gap-3">
                          <div class="flex-shrink-0 d-flex align-items-center">
                            <img src="{{asset($product->img)}}" class="w-px-100">
                          </div>
                          <div class="flex-grow-1">
                                <div class="row">
                                  <div class="col-md-8">
                                    <p class="me-3"><a href="javascript:void(0)" class="text-body">{{$product->name}}</a></p>
                                    <div class="text-muted mb-2 d-flex flex-wrap">
                                      <span class="me-1">Category:</span> <a href="javascript:void(0)" class="me-3">{{$product->category}}</a> <span class="badge bg-label-success">In Stock</span>
                                    </div>

                                    <div class="text-muted mb-2 d-flex flex-wrap">

                                      <span class="me-1">Quantity:
                                        <a href="{{ route('remove', ['product' => $product->id]) }}"><span class="tf-icons bx bx-minus me-1"></span></a> 
                                        <a href="javascript:void(0)" class="me-3">{{$product->pivot->quantity}}</a>
                                        <a href="{{ route('add', ['product' => $product->id]) }}"><span class="tf-icons bx bx-plus me-1"></span></a> 
                                      </span>
                                    </div>


                                  </div>
                                  <div class="col-md-4">
                                    <div class="text-md-end">

                                      <a href="{{ route('remove_from_cart', ['product' => $product->id]) }}" class="btn-close btn-pinned"></a>
                                      
                                      <div class="my-2 my-md-4 mb-md-5"><span class="text-secondary">₱ {{$product->price}}</span></div>

                                      <div class="my-2 my-md-4 mb-md-5"><span class="text-primary">Total {{$product->price * $product->pivot->quantity}}</span></div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </li>
                    @endforeach
                  @endforeach
                @endif

              </ul>

            </div>

            <!-- Cart right -->
            <div class="col-xl-4">
              <div class="border rounded p-4 mb-3 pb-3">

                <!-- Price Details -->
                <h6>Price Details</h6>
                <dl class="row mb-0">
                  <dt class="col-6 fw-normal">Bag Total</dt>
                  @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                      <dd class="col-6 text-end">₱ {{$details['total_price']}}</dd>
                    @endforeach
                  @endif

                  <dt class="col-6 fw-normal">Delivery Charges</dt>
                  <dd class="col-6 text-end">₱ {{$deliveryFee}}</dd>
                </dl>

                <hr class="mx-n4">
                <dl class="row mb-0">
                  <dt class="col-6">Total</dt>

                  @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <dd class="col-6 fw-medium text-end mb-0">₱ {{$details['total_price'] + $deliveryFee}}</dd>
                    @endforeach
                  @endif
                  
                </dl>
              </div>
              <div class="d-grid">
                @if(session('cart'))
                  @if(count(session('cart')[$cartKey]['items']) != 0)
                    <button type="button" class="btn btn-primary btn-next pb-1 mb-2">Next</button>
                  @endif
                @endif
                <a href="{{ route('customer.products') }}" type="button" class="btn btn-label-secondary btn-prev">Shop Again</a>

              </div>
            </div>
          </div>
        </div>

        <!-- Address -->
        <div id="checkout-address" class="content">
          <div class="row">
            <!-- Address left -->
            <div class="col-xl-8  col-xxl-9 mb-3 mb-xl-0">

              <!-- Select address -->
              <p>Select your preferable address</p>
              <div class="row mb-3">

                <div class="col-md mb-md-0 mb-2">
                  <div class="form-check custom-option custom-option-basic checked">
                    <label class="form-check-label custom-option-content" for="customRadioAddress1">
                      <input name="addressRadio" class="form-check-input" type="radio" value="0" id="customRadioAddress1" onchange="showForm()" checked>
                      <span class="custom-option-header mb-2">
                        <span class="fw-medium mb-0">Use My Address</span>
                        <span class="badge bg-label-primary">Home</span>
                      </span>
                      <span class="custom-option-body">
                        <small>{{auth()->user()->customer->address}}<br> Mobile : {{auth()->user()->customer->contact}}</small>
                      </span>
                    </label>
                  </div>
                </div>

                <div class="col-md">
                  <div class="form-check custom-option custom-option-basic">
                    <label class="form-check-label custom-option-content" for="customRadioAddress2">

                      <input name="addressRadio" class="form-check-input" type="radio" value="1" id="customRadioAddress2" onchange="showForm()">
                      <span class="custom-option-header mb-2">
                        <span class="fw-medium mb-0">Custom Address</span>
                        <span class="badge bg-label-success">Custom</span>
                      </span>
                    </label>
                  </div>
                </div>

              </div>

              <div id="addNewAddressForm" style="display: none;">
                <div class="row g-3">

                  <div class="col-12">
                    <label class="form-label w-100" for="address1">Address Line</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="address1" name="address" class="form-control"/>
                    </div>
                  </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="contact">Contact Number</label>
                      <input type="text" id="contact" name="contact" class="form-control"/>
                    </div>

                    <div class="col-12">
                      <a href="#" onclick="validate()" class="btn btn-success me-sm-3 me-1">Validate</a>
                    </div>
                  </div>

                </div>
              </div>




            <!-- Address right -->
            <div class="col-xl-4 col-xxl-3">
              <div class="border rounded p-4 pb-3 mb-3">

                <!-- Estimated Delivery -->
                <h6>Products</h6>
                @if(session('cart'))
                <ul class="list-unstyled">
                  @foreach(session('cart') as $id => $details)
                    @foreach($details['items'] as $product)
                      <li class="d-flex gap-3 align-items-center">
                        <div class="flex-shrink-0">
                          <img src="{{asset($product->img)}}" alt="google home" class="w-px-50">
                        </div>
                        <div class="flex-grow-1">
                          <p class="mb-0"><a class="text-body">{{$product->name}}</a></p>
                        </div>
                      </li>
                    @endforeach
                  @endforeach
                </ul>


                <hr class="mx-n4">

                <!-- Price Details -->
                <h6>Price Details</h6>
                <dl class="row mb-0">

                  <dt class="col-6 fw-normal">Subtotal</dt>
                  @foreach(session('cart') as $id => $details)
                    <dd class="col-6 text-end">₱ {{$details['total_price']}}</dd>
                  @endforeach

                  <dt class="col-6 fw-normal">Delivery Charges</dt>
                  <dd class="col-6 text-end">₱ {{$deliveryFee}}</dd>

                </dl>
                <hr class="mx-n4">
                <dl class="row mb-0">
                  <dt class="col-6">Total</dt>
                  @foreach(session('cart') as $id => $details)
                      <dd class="col-6 fw-medium text-end mb-0">₱ {{$details['total_price'] + $deliveryFee}}</dd>
                  @endforeach
                </dl>
                
                @endif
              </div>
                      
              <div class="d-grid">
                <button type="button" class="btn btn-primary btn-next pb-1 mb-2" id="placeOrderButton" onclick="check()">Next</button>
                <button type="button" class="btn btn-label-secondary btn-prev">Back</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Payment -->
        <div id="checkout-payment" class="content">
          <div class="row">
            <!-- Payment left -->
            <div class="col-xl-8 col-xxl-9 mb-3 mb-xl-0">
              <p>Select your payment method</p>
              <div class="col-xxl-9 col-lg-9">

                <ul class="nav nav-pills mb-3" id="paymentTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-cod-tab" data-bs-toggle="pill" data-bs-target="#pills-cod" type="button" role="tab" aria-controls="pills-cod" aria-selected="false" onclick="toggleRequired('cod')">Cash On Delivery</button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-cc-tab" data-bs-toggle="pill" data-bs-target="#pills-cc" type="button" role="tab" aria-controls="pills-cc" aria-selected="true" onclick="toggleRequired('gcash')">Gcash</button>
                  </li>

                  <input type="hidden" name="MOP" id="MOP" value="">
                  <input type="hidden" name="deliveryFee" id="deliveryFee" value="{{$deliveryFee}}">
                </ul>

                <!-- <div class="row g-6">
                  <div class="col-6">
                    <label for="giftCardNumber" class="form-label">Senior Citizen Discount (20%)</label>
                    <input  name="discount" class="form-control" type="file">
                  </div>
                </div> -->

                <div class="tab-content px-0 border-0" id="paymentTabsContent">
                  <!-- COD -->
                  <div class="tab-pane fade show active" id="pills-cod" role="tabpanel" aria-labelledby="pills-cod-tab">
                    <p>Cash on Delivery is a type of payment method where the recipient make payment for the order at the time of delivery rather than in advance.</p>
                  </div>

                  <!-- GCASH -->
                  <div class="tab-pane fade" id="pills-cc" role="tabpanel" aria-labelledby="pills-cc-tab">
                    <h6>Scan QR code for Payment</h6>
                    <div class="row g-6">
                      <div class="col-6">
                        <label for="gcash" class="form-label">Upload Proof of Payment</label>
                        <input id="gcash" type="file" name="POP" class="form-control" required>
                      </div>
                      <div class="col-6">
                        <img src="../../../../../../images/qr/QR.JPG" class="form-control">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              

            </div>
            <!-- Address right -->
            <div class="col-xl-4 col-xxl-3">
              <div class="border rounded p-4">

                <!-- Price Details -->
                <h6>Price Details</h6>
                <dl class="row">
                @if(session('cart'))

                  <dt class="col-6 fw-normal">Order Total</dt>
                  @foreach(session('cart') as $id => $details)
                    <dd class="col-6 text-end">₱ {{$details['total_price']}}</dd>
                      <dt class="col-6 fw-normal">Delivery Charge</dt>
                      <dd class="col-6 text-end">₱ {{$deliveryFee}}</dd>

                  @endforeach
                </dl>
                <hr class="mx-n4">
                <dl class="row">
                  <dt class="col-6 mb-3">Total</dt>

                  @foreach(session('cart') as $id => $details)
                      <dd class="col-6 fw-medium text-end mb-0">₱ {{$details['total_price'] + $deliveryFee}}</dd>
                  @endforeach

                  <dt class="col-6 fw-normal">Deliver to:</dt>
                  <dd id="homeIcon"class="col-6 fw-medium text-end mb-0"><span class="badge bg-label-primary">Home</span></dd>
                  <dd id="customIcon"class="col-6 fw-medium text-end mb-0"><span class="badge bg-label-success">Custom</span></dd>
                @endif
                </dl>
                <!-- Address Details -->
                <address class="text-heading">
                  <span> {{auth()->user()->customer->fname}}</span>
                  <p id="addressParagraph"></p>
                  <p id="contactParagraph"></p>
                </address>
              </div>

              <div class="d-grid">
                <button class="btn btn-success pb-1 mt-3 mb-2" onclick="submitForm()">Submit</button>
                <button type="button" class="btn btn-label-secondary btn-prev">Back</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Confirmation -->
        <div id="checkout-confirmation" class="content">
          <div class="row mb-3">
            <div class="col-12 col-lg-8 mx-auto text-center mb-3">
              <h4 class="mt-2">Thank You! 😇</h4>
              <p>Your order <a href="javascript:void(0)">#1536548131</a> has been placed!</p>
              <p>We sent an email to <a href="mailto:john.doe@example.com">john.doe@example.com</a> with your order confirmation and receipt. If the email hasn't arrived within two minutes, please check your spam folder to see if the email was routed there.</p>
              <p><span class="fw-medium"><i class="bx bx-time-five me-1"></i> Time placed:&nbsp;</span> 25/05/2020 13:35pm</p>
            </div>
            <!-- Confirmation details -->
            <div class="col-12">
              <ul class="list-group list-group-horizontal-md">
                <li class="list-group-item flex-fill p-4 text-heading">
                  <h6 class="d-flex align-items-center gap-1"><i class="bx bx-map"></i> Shipping</h6>
                  <address class="mb-0">
                    John Doe <br />
                    4135 Parkway Street,<br />
                    Los Angeles, CA 90017,<br />
                    USA
                  </address>
                  <p class="mb-0 mt-3">
                    +123456789
                  </p>
                </li>
                <li class="list-group-item flex-fill p-4 text-heading">
                  <h6 class="d-flex align-items-center gap-1"><i class="bx bx-credit-card"></i> Billing Address</h6>
                  <address class="mb-0">
                    John Doe <br />
                    4135 Parkway Street,<br />
                    Los Angeles, CA 90017,<br />
                    USA
                  </address>
                  <p class="mb-0 mt-3">
                    +123456789
                  </p>
                </li>
                <li class="list-group-item flex-fill p-4 text-heading">
                  <h6 class="d-flex align-items-center gap-1"><i class="bx bxs-ship"></i> Shipping Method</h6>
                  <p class="fw-medium mb-3">Preferred Method:</p>
                  Standard Delivery<br />
                  (Normally 3-4 business days)
                </li>
              </ul>
            </div>
          </div>

          <div class="row">
            <!-- Confirmation items -->
            <div class="col-xl-9 mb-3 mb-xl-0">
              <ul class="list-group">
                <li class="list-group-item p-4">
                  <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                      <img src="../../assets/img/products/1.png" alt="google home" class="w-px-75">
                    </div>
                    <div class="flex-grow-1">
                      <div class="row">
                        <div class="col-md-8">
                          <a href="javascript:void(0)" class="text-body">
                            <p>Google - Google Home - White</p>
                          </a>
                          <div class="text-muted mb-1 d-flex flex-wrap"><span class="me-1">Sold by:</span> <a href="javascript:void(0)" class="me-3">Apple</a> <span class="badge bg-label-success">In Stock</span></div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-md-end">
                            <div class="my-2 my-lg-4"><span class="text-primary">$299/</span><s class="text-muted">$359</s></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item p-4">
                  <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                      <img src="../../assets/img/products/2.png" alt="google home" class="w-px-75">
                    </div>
                    <div class="flex-grow-1">
                      <div class="row">
                        <div class="col-md-8">
                          <a href="javascript:void(0)" class="text-body">
                            <p>Apple iPhone 11 (64GB, Black)</p>
                          </a>
                          <div class="text-muted mb-1 d-flex flex-wrap"><span class="me-1">Sold by:</span> <a href="javascript:void(0)" class="me-3">Apple</a> <span class="badge bg-label-success">In Stock</span></div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-md-end">
                            <div class="my-2 my-lg-4"><span class="text-primary">$299/</span><s class="text-muted">$359</s></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Confirmation total -->
            <div class="col-xl-3">
              <div class="border rounded p-4 pb-3">
                <!-- Price Details -->
                <h6>Price Details</h6>
                <dl class="row mb-0">

                  <dt class="col-6 fw-normal">Order Total</dt>
                  <dd class="col-6 text-end">$1198.00</dd>

                  <dt class="col-sm-6 fw-normal">Delivery Charges</dt>
                  <dd class="col-sm-6 text-end"><s class="text-muted">$5.00</s> <span class="badge bg-label-success ms-1">Free</span></dd>
                </dl>
                <hr class="mx-n4">
                <dl class="row mb-0">
                  <dt class="col-6">Total</dt>
                  <dd class="col-6 fw-medium text-end mb-0">$1198.00</dd>
                </dl>
              </div>
            </div>
          </div>
        </div>


      </form>
    </div>
</div>
<!--/ Checkout Wizard -->


  </div>
</section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

  function showForm() {
    var customRadioAddress2 = $('#customRadioAddress2');
    var customRadioAddress1 = $('#customRadioAddress1');
    var address1 = $('#address1');
    var contact = $('#contact');
    var placeOrderButton = $('#placeOrderButton');
    var payment = $('#payment-button');

    // Toggle the visibility of the addNewAddressForm based on the radio button
    $('#addNewAddressForm').toggle(customRadioAddress2.prop('checked'));

    // Check if customRadioAddress1 is checked
    if (customRadioAddress1.is(':checked')) {
        // Enable the button
        placeOrderButton.prop('disabled', false);
        payment.prop('disabled', false);
    } 

    if (customRadioAddress2.is(':checked')) {
        // Check if both address1 and contact fields are not empty
      if (address1.val().trim() !== '' && contact.val().trim() !== '') {
          // Enable the button
          placeOrderButton.prop('disabled', false);
          payment.prop('disabled', false);
      } else {
          // Disable the button
          placeOrderButton.prop('disabled', true);
      }
    }
  }

  function validate()
  {
    var address1 = $('#address1');
    var contact = $('#contact');
    var placeOrderButton = $('#placeOrderButton');

    if (address1.val().trim() !== '' && contact.val().trim() !== '') {
        // Enable the button
        sessionStorage.setItem('address1', address1.val());
        sessionStorage.setItem('contact', contact.val());       
        placeOrderButton.prop('disabled', false);
    } else {
        // Disable the button
        alert('Please enter address line and contact number.');
        placeOrderButton.prop('disabled', true);
    }

  }

  function check(){

    var customRadioAddress2 = $('#customRadioAddress2');
    var customRadioAddress1 = $('#customRadioAddress1');
    
    var homeIcon = document.getElementById('homeIcon');
    var customIcon = document.getElementById('customIcon');
    var address1 = $('#address1');
    var contact = $('#contact');

    if (customRadioAddress1.is(':checked')) {
      var userAddress = @json(auth()->user()->customer->address);
      var userContact = @json(auth()->user()->customer->contact);
      document.getElementById('addressParagraph').textContent = userAddress;
      document.getElementById('contactParagraph').textContent = userContact;
      homeIcon.style.display = 'block';
      customIcon.style.display = 'none';
    } 

    if (customRadioAddress2.is(':checked')) {
      if (storedAddress !== null && storedContact !==null) {
        var storedAddress = sessionStorage.getItem('address1');
        var storedContact = sessionStorage.getItem('contact');
        // Update the content of the paragraph tag
        document.getElementById('addressParagraph').textContent = storedAddress;
        document.getElementById('contactParagraph').textContent = storedContact;

        homeIcon.style.display = 'none';
        customIcon.style.display = 'block';
      }

    }

  }

  function submitForm() {
      // Check if Gcash button is active
      var gcashButton = document.getElementById("pills-cc-tab");
      var isGcashActive = gcashButton.classList.contains("active");
      var payMethod = document.getElementById("MOP");
      
      // Check if Gcash input field is not empty
      var gcashInput = document.getElementById("gcash");
      var isGcashInputEmpty = gcashInput.value.trim() === '';

      if (isGcashActive) {
          if (isGcashInputEmpty) {
              // Gcash is active, and the input field is empty
              return;
          }
          // Gcash is active, and the input field is not empty
          payMethod.value = "GCASH";
      }
      else{
        payMethod.value = "CASH";
      }

      // Get the form element
      var form = document.getElementById("wizard-checkout-form");
      // console.log('HAHAHAH')
      // Submit the form
      form.submit();
  }





</script>
@endsection