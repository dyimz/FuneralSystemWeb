@extends('layouts.landing.master')

@section('title')
   Products
@endsection

@section('content')
<section class="section-py">
   <div class="container">

      <h3 class="text-center mb-5 mt-5"><span class="section-title">Available</span> Products</h3>
      @if(session('success'))
         <div class="alert alert-primary alert-dismissible" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      <!-- <div class="row gy-5 mt-2"> -->



         <div class="row mb-5">

            @foreach($products as $prod)
               <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                     <div class="text-center">
                        <img class="card-img-top mx-auto" src="{{asset($prod->img)}}" alt="Card image cap" style="width: 250px; height: 200px;" />
                     </div>

                     <div class="card-body">
                        <h5 class="card-title">{{$prod->name}}</h5>
                        <p class="card-text">
                           {{$prod->description}}
                        </p>

                        @auth
                        <div>
                           
                        </div>
                           <a href="{{route('add_to_cart', $prod->id)}}" class="btn btn-outline-success"> <i class="bx bx-cart-add"></i> Add to cart</a>
                        @else
                           <a href="{{route('login')}}" class="btn btn-outline-success"> <i class="bx bx-cart-add"></i> Add to cart</a>
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