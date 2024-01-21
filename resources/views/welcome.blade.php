@extends('layouts.landing.master')

@section('title')
   Funeral Website
@endsection

@section('header')
<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>

<!-- Include jQuery (required by Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>


<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>




<style>
.round-image {
    border-radius: 50%;
    width: 75%;
    height: auto;
    padding: 20px;
    display: block; /* Make the image a block element */
    margin: auto;
}

.card {
  background-color: rgba(62, 134, 209, 0.5);
  border-radius: 20px;
}

.card-title {
  font-family: "Citadel Script W01";
  font-size: 50px;
  color: white;
  text-align: center;
}

.card-text {
  text-align: center;
  font-family: "Helvetica", Sans-Serif;
  color: white;
}
a {
    text-decoration: none;
}
</style>
@endsection
@section('content')
  <!-- Hero: Start -->
  <section id="hero-animation">
    <div id="landingHero" class="section-py landing-hero position-relative">
      <div class="container">

        <div id="heroDashboardAnimation" class="hero-animation-img">

            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
              <div class="hero-text-box text-center">
                <h1 class="text-primary hero-title display-4 fw-bold">Pikes Funeral Homes</h1>
              </div> 
            </div>
         
        </div>
      </div>
    </div>

  </section>
  <!-- Hero: End -->


  <!-- Real customers reviews: Start -->
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0 pt-5">
    <!-- What people say slider: Start -->
    <div class="container" >
      <div class="row align-items-center gx-0 gy-4 g-lg-5">

        <div class="col-md-12 col-lg-12 col-xl-12">
          <div class="text-center mb-1">
            <h3 class="mb-1"><span class="landing-title">Packages</span></h3>
        

          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12">
          <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
            <div class="swiper" id="swiper-reviews">
              <div class="swiper-wrapper mb-3">

                @foreach($packages as $pack)
                  <div class="swiper-slide">
                    <div class="card pack h-100">

                      <div class="card-header">
                        <h3 class="text-center mb-1">
                          <span class="section-title">{{$pack->name}}</span>
                        </h3>
                      </div>
                      
                      <div class="card-body text-body justify-content-between ">
                        <p>
                          {{$pack->description}}
                        </p>
          

                        <div class="text">
                          <h4 class="mb-4">Inclusions:</h4>
                        </div>

                        @foreach($pack->services as $service)
                          <ul class="list-unstyled">
                            <li>
                              <h5>
                                <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="bx bx-check bx-xs"></i></span>
                                {{$service->name}}
                              </h5>
                            </li>
                          </ul>
                          @endforeach

                      </div>

                      <div class="card-footer text-center">
                          <!-- Button goes here -->
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
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>

              <div class="landing-reviews-btns d-flex align-items-center gap-3">
                <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn" type="button">
                  <i class="bx bx-chevron-left bx-sm"></i>
                </button>
                <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
                  <i class="bx bx-chevron-right bx-sm"></i>
                </button>
              </div>
            
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- What people say slider: End -->
    <hr class="m-0" />

  </section>
  <!-- Real customers reviews: End -->

  <!-- Useful features: Start -->
  <section id="landingFeatures" class="section-py landing-features">

    <div class="container">

      <h3 class="text-center mb-1">
        <span class="section-title">Obituaries</span>
      </h3>

      <div class="row">
      
          <div class="col-12">

            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">

              @if (!empty($groups)) 
                @php
                  $firstGroup = reset($groups);
                @endphp
                <div class="carousel-item active">
       
                      <div class="row">
                      @foreach ($firstGroup as $recordIndex => $record) 
                      <div class="col-md-4 mb-3">
                        <a href="{{route('landing.showObituary', $record->id)}}">
                          <div class="card">
                              <img class="img-fluid round-image" alt="100%x280" src="{{asset($record->image)}}">
                              <div class="card-body">
                                  <h4 class="card-title" >{{$record->fname}} {{$record->lname}}</h4>
                                  @php
                                      $born = \Carbon\Carbon::parse($record->dateofbirth);
                                      $dateofbirth = $born->format('F d, Y');
                                      $died = \Carbon\Carbon::parse($record->dateofdeath);
                                      $dateofdeath = $died->format('F d, Y');
                                  @endphp
                                  <p class="card-text">Born: {{$dateofbirth}}</p>
                                  <p class="card-text">Died: {{$dateofdeath}}</p>
                              </div>
                          </div>
                        </a>
                      </div>
                      @endforeach
                      </div>
                </div>
              @endif

              @if (!empty($groups))
                @php
                  $remainingGroups = array_slice($groups, 1);
                @endphp
                @foreach ($remainingGroups as $groupIndex => $group)
                <div class="carousel-item">
                  <div class="row">

                    @foreach ($group as $recordIndex => $record)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img class="img-fluid round-image" alt="100%x280" src="{{asset($record->image)}}">
                            <div class="card-body">
                                <h4 class="card-title">{{$record->fname}} {{$record->lname}}</h4>
                                @php
                                      $born = \Carbon\Carbon::parse($record->dateofbirth);
                                      $dateofbirth = $born->format('F d, Y');
                                      $died = \Carbon\Carbon::parse($record->dateofdeath);
                                      $dateofdeath = $died->format('F d, Y');
                                  @endphp
                                  <p class="card-text">Born: {{$dateofbirth}}</p>
                                  <p class="card-text">Died: {{$dateofdeath}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                  </div>
                </div>
                @endforeach
               
              @endif

              </div>

            </div>

          </div>
          <div class="col-12 text-left">
              <a class="btn btn-label-primary reviews-btn" style="color:white;" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                  <i class="bx bx-chevron-left bx-sm"></i>
              </a>
              <a class="btn btn-label-primary reviews-btn " style="color:white;" href="#carouselExampleIndicators2" role="button" data-slide="next">
                  <i class="bx bx-chevron-right bx-sm"></i>
              </a>
          </div>

        </div>
    </div>

  </section>
  <!-- Useful features: End -->
  
  
    <!-- Contact Us: Start -->
  <section id="landingContact" class="section-py bg-body landing-contact">
    <div class="container">

      <h3 class="text-center mb-1"><span class="section-title">About Us</span></h3>
      <img class="map" src="../../../images/maps.JPG" alt="">
    </div>
    


  </section>
  <!-- Contact Us: End -->