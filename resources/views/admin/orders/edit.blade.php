@extends('layouts.internal.master')

@section('title')
   Edit Product
@endsection


@section('content')

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Orders /</span> Details
</h4>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
  <div class="d-flex flex-column justify-content-center">
    <h5 class="mb-1 mt-3">Order #{{$order->id}} 
        @if($order->status == 'PREPARING')
          <span class="badge bg-label-warning">{{$order->status}}</span>
        @elseif($order->status == 'ON-GOING')
          <span class="badge bg-label-info">{{$order->status}}</span>
        @elseif($order->status == 'DONE')
          <span class="badge bg-label-success">{{$order->status}}</span>
        @else
          <span class="badge bg-label-primary">{{$order->status}}</span>
        @endif
    </h5>
    <p class="text-body">{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y h:iA') }}<span id="orderYear"></span></p>
  </div>
</div>

<form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data">
  @method('PATCH')
  @csrf
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title m-0">Ordered Item/s: 
            @if($order->type == 'PACKAGE')
            <strong>{{$order->package->name}}
            @endif
          </strong></h5>
          <!-- <h6 class="m-0"><a href=" javascript:void(0)">Edit</a></h6> -->
        </div>

        <div class="card-body">
          @if($order->type == 'PACKAGE')
            <h6 >Deceased Name: <a href="{{route('deceased.edit', $order->deceased_id)}}">{{$order->deceased->fname}} {{$order->deceased->lname}}</a></h6>
          @endif

          
          @if(session('status'))
              <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>
            @endif
          
          <div class="card-datatable table-responsive">

            @if($order->type === 'PRODUCTS')
              <table class="datatables-order-details table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th class="w-50">Product</th>
                    <th class="w-25">Price</th>
                    <th class="w-25">Qty</th>
                    <th>total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order->orderlines as $prod)
                    <tr>      
                      <th></th>
                      <th></th>
                      <th>{{$prod->name}}</th>
                      <th>{{$prod->price}}</th>
                      <th>{{$prod->quantity}}</th>
                      <th>{{$prod->price * $prod->quantity}}</th>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                <div class="order-calculations">

                    <div class="d-flex justify-content-between mb-2">
                      <span class="w-px-100">Subtotal:</span>
                      <span class="text-heading">₱ {{$order->total_price - 50}}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                      <span class="w-px-100">Delivery Fee:</span>
                      <span class="text-heading mb-0">₱ 50</span>
                    </div>

                    <div class="d-flex justify-content-between">
                      <h6 class="w-px-100 mb-0">Total:</h6>
                      <h6 class="mb-0">₱ {{$order->total_price}}</h6>
                    </div>
            
                </div>
              </div>
            @endif

            @if($order->type === 'PACKAGE')
              <table class="datatables-order-details table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th class="w-50">Inclusion</th>
                    <th class="w-25">Price</th>
                    <th class="w-25"></th>
                    <th>total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order->orderlines as $serv)
                    <tr>      
                      <th></th>
                      <th></th>
                      <th>{{$serv->name}}</th>
                      <th>{{$serv->price}}</th>
                      <th></th>
                      <th>{{$serv->price}}</th>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                <div class="order-calculations">

                    <div class="d-flex justify-content-between mb-2">
                      <span class="w-px-100">Subtotal:</span>
                      <span class="text-heading">₱ {{$order->subtotal}}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                      <span class="w-px-100">Discount:</span>
                      <span class="text-heading mb-0">- ₱ {{$order->subtotal - $order->total_price}}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                      <h6 class="w-px-100 mb-0">Total:</h6>
                      <h6 class="mb-0">₱ {{$order->total_price}}</h6>
                    </div>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label" for="multicol-first-name">Payment Status:</label>
                    {!! Form::select('paymentstatus', [
                      'NOT PAID' => 'NOT PAID', 
                      'PAID (DOWNPAYMENT)' => 'PAID (DOWNPAYMENT)', 
                      'FULLY PAID' => 'FULLY PAID', 
                    ], $order->paymentstatus,['class' => 'select form-select', 'required' => 'true']) !!}
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="multicol-first-name">Discounted (20%):</label>
                    {!! Form::select('discounted', [
                      'NO' => 'NO', 
                      'YES' => 'YES', 
                    ], $order->discounted,['class' => 'select form-select', 'required' => 'true']) !!}
                  </div>


                </div>
              </div>
            @else
              <div class="col-md-4">
                  <label class="form-label" for="multicol-first-name">Payment Statu:</label>
                  {!! Form::select('paymentstatus', [
                    'NOT PAID' => 'NOT PAID', 
                    'FULLY PAID' => 'FULLY PAID', 
                  ], $order->paymentstatus,['class' => 'select form-select', 'required' => 'true']) !!}
              </div>
            @endif
            
        </div>
          <hr>
       
          <!-- Change status -->
          <div class="card-header d-flex justify-content-between align-items-center">
            <label class="form-label" for="multicol-first-name">Status:</label>
              <div class="progress-indicator-container">
                @if($order->status == 'PREPARING')
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(0)">PLACED</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(1)">PREPARING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(2)">ON-GOING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(3)">DONE</button>
                  <?php $status = 2?>
                @elseif($order->status == 'ON-GOING')
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(0)">PLACED</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(1)">PREPARING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(2)">ON-GOING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(3)">DONE</button>
                  <?php $status = 3?>
                @elseif($order->status == 'DONE')
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(0)">PLACED</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(1)">PREPARING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(2)">ON-GOING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(3)">DONE</button>
                  <?php $status = 4?>
                @else
                  <button type="button" class="btn btn-outline-primary active" onclick="setStatus(0)">PLACED</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(1)">PREPARING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(2)">ON-GOING</button>
                    <span class="tf-icons bx bx-chevron-right"></span>
                  <button type="button" class="btn btn-outline-primary" onclick="setStatus(3)">DONE</button>
                  <?php $status = 1?>
                @endif

                <div class="demo-vertical-spacing">
                  <div class="progress">
                  @if($order->status == 'PREPARING')
                    <div class="progress-bar bg-primary" id="progressBar" role="progressbar" style="width: 33.33%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  @elseif($order->status == 'ON-GOING')
                    <div class="progress-bar bg-primary" id="progressBar" role="progressbar" style="width: 66.66%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  @elseif($order->status == 'DONE')
                    <div class="progress-bar bg-primary" id="progressBar" role="progressbar" style="width: 99.99%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  @else
                    <div class="progress-bar bg-primary" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  @endif
                  </div>
                </div>

              </div>
              
          </div>
          <input type="hidden" name="status" id="statusInput" value="{{$status}}">
          <!-- Change status -->
          
          @if($order->type === 'PACKAGE')
            @if($order->formalin == 'YES')
              <hr> 
              <div class="card-header">
                  <h5 class="card-title m-0">Formalin:</h5>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label" for="multicol-first-name">Extend Formalin (days):</label>
                    <input type="number" id="extensiondays" name="extensiondays" class="form-control" value="{{old('extensiondays', $order->extensiondays) }}"/>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="multicol-first-name">Extension Price:</label>
                    <input type="number" id="extensionprice" name="extensionprice" class="form-control" value="{{old('extensionprice', $order->extensionprice) }}"/>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="multicol-first-name">Extension Payment:</label>
                    {!! Form::select('extensionpayment', [
                      '' => '-', 
                      'NOT PAID' => 'NOT PAID', 
                      'FULLY PAID' => 'FULLY PAID', 
                    ], $order->extensionpayment,['class' => 'select form-select']) !!}
                  </div>
                </div>
              </div>
              @endif
          @endif

          @if($order->type === 'PACKAGE')
            <!-- User Request -->
            <hr>
            <div class="card-header">
              <h5 class="card-title m-0">Customer Request:</h5>
            </div>

            <div class="card-body">
              <div class="row">


                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Message</label>
                  <textarea type="text" id="message" name="message" class="form-control" required >{{old('message', $order->message) }}</textarea>
                  @if ($errors->has('message'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('message') }}</span></small>
                  @endif
                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Casket Size</label>
                    {!! Form::select('cascketsize', [
                          'INFANT' => 'INFANT', 
                          'CHILD' => 'CHILD', 
                          'STANDARD' => 'STANDARD', 
                          'OVERSIZED' => 'OVERSIZED', 
                        ], $order->cascketsize,['class' => 'select form-select', 'required' => 'true']) !!}
                  @if ($errors->has('cascketsize'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('cascketsize') }}</span></small>
                  @endif
                </div>

                <div class="col-md-4 mb-4">
                  <label class="form-label" for="multicol-first-name">Formalin:</label>
                    {!! Form::select('formalin', [
                        'YES' => 'YES', 
                        'NO' => 'NO', 
                    ], $order->formalin,['class' => 'select form-select', 'required' => 'true']) !!}
                  @if ($errors->has('formalin'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('formalin') }}</span></small>
                  @endif
                </div>

                <div class="col-md-4 mb-4">
                  <label class="form-label" for="multicol-first-name">Memorial Products:</label>
                    {!! Form::select('memorialproducts', [
                        'YES' => 'YES', 
                        'NO' => 'NO', 
                    ], $order->memorialproducts,['class' => 'select form-select', 'required' => 'true']) !!}
                  @if ($errors->has('memorialproducts'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('memorialproducts') }}</span></small>
                  @endif
                </div>

                <div class="col-md-4 mb-4">
                  <label class="form-label" for="multicol-first-name">Makeup:</label>
                    {!! Form::select('makeup', [
                      'YES' => 'YES', 
                      'NO' => 'NO', 
                    ], $order->makeup,['class' => 'select form-select', 'required' => 'true']) !!}
                  @if ($errors->has('makeup'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('makeup') }}</span></small>
                  @endif
                </div>

                <div class="col-md-12 mb-4">
                  <label class="form-label" for="multicol-first-name">Note:</label>
                  <textarea type="text" id="note" name="note" class="form-control" required >{{old('note', $order->note) }}</textarea>
                  @if ($errors->has('note'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('note') }}</span></small>
                  @endif
                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Location From:</label>
                  <input type="text" id="locationfrom" name="locationfrom" class="form-control" required value="{{old('locationfrom', $order->locationfrom) }}"/>
                  @if ($errors->has('locationfrom'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('locationfrom') }}</span></small>
                  @endif
                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Location To:</label>
                  <input type="text" id="locationto" name="locationto" class="form-control" required value="{{old('locationto', $order->locationto) }}"/>
                  @if ($errors->has('locationto'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('locationto') }}</span></small>
                  @endif
                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Wake Duration From:</label>
                  <input type="datetime-local" id="durationfrom" name="durationfrom" class="form-control" required value="{{old('durationfrom', $order->durationfrom) }}"/>
                  @if ($errors->has('durationfrom'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('durationfrom') }}</span></small>
                  @endif
                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label" for="multicol-first-name">Wake Duration To:</label>
                  <input type="datetime-local" id="durationto" name="durationto" class="form-control" required value="{{old('durationto', $order->durationto) }}"/>
                  @if ($errors->has('durationto'))
                    <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('durationto') }}</span></small>
                  @endif
                </div>

              </div>
            </div>
            <!-- User Request -->
          @endif
        <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">
              Update
            </button>
          <a href="{{ route('orders.index') }}" type="button" class="btn btn-label-secondary">Back</a>
            
          </div>

        </div>  

      </div>
      

      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title m-0">Payment Details:</h5>
        </div>

        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h6>Payment Method:</h6>
          </div>
          <p class=" mb-4">{{strtoupper($order->MOP)}}</p>

          @if($order->POP != null)
          <div class="d-flex justify-content-between">
            <h6>Proof of Payment:</h6>
          </div>
            <a href="{{asset($order->POP)}}" download="ProofOfPayement-Order#{{$order->id}}.jpg">Download</a>
          @endif
        </div>
        
      </div>
      

    </div>

    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-title m-0">Customer details </h6>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-start align-items-center mb-4">
            <div class="avatar me-2">

              <img src="{{asset($order->user->customer->custimage)}}" alt="Avatar" class="rounded-circle">
            </div>
            <div class="d-flex flex-column">
              <a href="{{route('customers.show', $order->user->customer->id)}}" class="text-body text-nowrap">
                <h6 class="mb-0">{{$order->user->name}}</h6>
              </a>
              <small class="text-muted">Customer ID: {{$order->user->customer->id}}</small></div>
          </div>
          <div class="d-flex justify-content-start align-items-center mb-4">
            <span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class="bx bx-cart-alt bx-sm lh-sm"></i></span>
            <h6 class="text-body text-nowrap mb-0">{{$count}} Orders</h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6>Contact info</h6>
          </div>
          <p class=" mb-1">Email: {{$order->user->email}}</p>
          <p class=" mb-0">Mobile: {{$order->user->customer->contact}}</p>
        </div>
      </div>

      @if($order->type === 'PRODUCTS')
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
          <h6 class="card-title m-0">Shipping address</h6>
        </div>
        <div class="card-body">
          <p class="mb-0">Address: {{$order->address}}</p>
          <p class="mb-0">Contact: {{$order->contact}}</p>
        </div>
      </div>
      @endif

      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
          <h6 class="card-title m-0">Billing information</h6>
        </div>
        <div class="card-body">
          @if($order->MOP = 'CASH')
            <p class="mb-4">Cash Payment</p>
          @else
            <p class="mb-4">Gcash Payement</p>
          @endif
        </div>

      </div>
    </div>

  </div>
</form>

@endsection

@section('script')

<script>
function setStatus(index) {
        // Remove the 'active' class from all indicators
        $('.btn-outline-primary').removeClass('active');

        // Add the 'active' class to the clicked indicator and all previous indicators
        for (var i = 0; i <= index; i++) {
            $('.btn-outline-primary').eq(i).addClass('active');
        }
        var progressValue = index * 33.33;
        $('#progressBar').css('width', progressValue + '%');
        
        $('#statusInput').val(index + 1);
    }
</script>
<script>
    document.getElementById('extensiondays').addEventListener('input', function() {
        // Get the entered number of days
        var numberOfDays = this.value;

        // Calculate the extension price based on the entered number of days
        var extensionPrice = numberOfDays * 1000; // Adjust the multiplier as needed

        // Set the calculated extension price to the extensionprice input field
        document.getElementById('extensionprice').value = extensionPrice;
    });
</script>
@endsection