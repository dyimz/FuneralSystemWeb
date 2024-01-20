@extends('layouts.landing.master')

@section('title')
   Package
@endsection

@section('content')
<section class="section-py">
   <div class="container">

      <h3 class="text-center mb-5 mt-5"><span class="section-title">Available</span> Packages</h3>
      @if(session('success'))
         <div class="alert alert-primary alert-dismissible" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      <!-- <div class="row gy-5 mt-2"> -->



         <div class="row mb-5">

            @foreach($packages as $pack)
               <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                     <!-- <div class="text-center">
                        <img class="card-img-top mx-auto" src="{{asset($pack->img)}}" alt="Card image cap" style="width: 250px; height: 200px;" />
                     </div> -->

                     <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                           <h5 class="card-title">{{$pack->name}}</h5>
                           <h5 class="text-primary me-3 mb-0">₱ {{$pack->price}}</h5>
                        </div>
                  
                           <span class="badge bg-label-secondary">Inclusions:</span>
                           <div class="demo-inline-spacing mt-2 mb-3">
                              <div class="list-group list-group-flush">
                                 @foreach($pack->services as $service)
                                    <a class="list-group-item">{{$service->name}}</a>
                                 @endforeach
                              </div>
                           </div>
                 
                        @auth
                           <a href="{{route('customer.availPackage', $pack->id)}}" class="btn btn-outline-primary"> <i class="bx bx-cart-add"></i> Avail</a>
                        @else
                           <a href="{{route('login')}}" class="btn btn-outline-primary"> <i class="bx bx-cart-add"></i> Avail</a>
                        @endauth


                     </div>

                  </div>
               </div>
            @endforeach
         </div>
         
      <!-- </div> -->



    </div>
</section>

@endsection