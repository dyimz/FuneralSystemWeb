@extends('layouts.landing.master')

@section('title')
   Funeral Website
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

        <!-- <div class="col-md-6 col-lg-7 col-xl-9">
          <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
            <div class="swiper" id="swiper-reviews">
              <div class="swiper-wrapper">

                @foreach($packages as $pack)
                  <div class="swiper-slide">
                    <div class="card h-100">
                      <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                        <div class="mb-3">
                          <img src="./../../../../../images/PIKES-logo.png" width="50" height="50" alt="client logo" />
                          <h5 class="mb-3">{{$pack->name}}</h5>
                        </div>
                        <p>
                          “Vuexy is hands down the most useful front end Bootstrap theme I've ever used. I can't wait
                          to use it again for my next project.”
                        </p>

                      </div>
                    </div>
                  </div>
                @endforeach


              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div> -->

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

                <!-- <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="../../assets/img/front-pages/branding/logo-2.png" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="../../assets/img/front-pages/branding/logo-3.png" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        This template is really clean & well documented. The docs are really easy to understand and
                        it's always easy to find a screenshot from their website.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Curtis Fletcher</h6>
                          <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="../../assets/img/front-pages/branding/logo-4.png" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        All the requirements for developers have been taken into consideration, so I’m able to build
                        any interface I want.
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bx-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="../../assets/img/front-pages/branding/logo-5.png" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                        dashboard sites on almost any project.”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Eugenia Moore</h6>
                          <p class="small text-muted mb-0">Founder of Hubspot</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        <img src="../../assets/img/front-pages/branding/logo-6.png" alt="client logo" class="client-logo img-fluid" />
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo mollitia, ad eum
                        officia numquam nostrum repellendus consequuntur!
                      </p>
                      <div class="text-warning mb-3">
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bxs-star bx-sm"></i>
                        <i class="bx bx-star bx-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Continental</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

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

      <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">



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

