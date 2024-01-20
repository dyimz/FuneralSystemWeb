<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
      <!-- Menu logo wrapper: Start -->
      <div class="navbar-brand app-brand demo d-flex py-0 me-4">
        <!-- Mobile menu toggle: Start-->
        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
        </button>
        <!-- Mobile menu toggle: End-->
        <a href="/" class="app-brand-link">  
          <img src="../../../../../../images/PIKES-logo.png" alt="PIKES Logo" width="50" height="50">
        </a>
        
      </div>
      <!-- Menu logo wrapper: End -->
      <!-- Menu wrapper: Start -->
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="tf-icons bx bx-x bx-sm"></i>
        </button>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium" aria-current="page" href="/#landingHero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="/#landingFeatures">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="/#landingTeam">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="/#landingFAQ">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="/#landingContact">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{route('customer.products')}}">Products</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link fw-medium" href="{{route('customer.packages')}}">Packages</a>
          </li> -->
          @auth
          <li class="nav-item">
            <a class="nav-link fw-medium" href="/chatify">Chat</a>
          </li>
          @endauth

        </ul>
      </div>
      <div class="landing-menu-overlay d-lg-none"></div>
      <!-- Menu wrapper: End -->
      <!-- Toolbar: Start -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">

      <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        
      @auth
        @if(auth()->user()->role == 'customer')
          @php
            $cartKey = key(session('cart'));
          @endphp
          @if(session('cart') && session('cart')[$cartKey]['items'])
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="bx bx-cart bx-sm"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">
                      {{ count(session('cart')[$cartKey]['items']) }}
                  </span>
              </a>
          @else
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="bx bx-cart bx-sm"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">
                      0
                  </span>
              </a>
          @endif
        @endif
      @endauth

        <ul class="dropdown-menu dropdown-menu-end py-0">
          <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
              <h5 class="text-body mb-0 me-auto">Cart</h5>
              <a href="{{route('checkout')}}" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Go to Cart"><i class="bx fs-4 bx-cart"></i></a>
            </div>
          </li>
          <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">
              @auth
                @if(auth()->user()->role == 'customer')
                  @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                      @foreach($details['items'] as $product)
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{asset($product->img)}}" alt class="w-px-40 h-auto" style="width: 40px; height: auto;">
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1"> {{$product->name}} </h6>
                              <p class="mb-0"> {{$product->category}}</p>
                              <small class="text-muted"><a href="" class="me-3">Price: ${{$product->price}} </a> Quantity: {{$product->pivot->quantity}}</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <!-- <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a> -->
                              <!-- <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a> -->
                            </div>
                          </div>
                        </li>
                      @endforeach
                    @endforeach
                  @endif
                @endif
              @endauth
            </ul>
          </li>
          <li class="dropdown-menu-footer border-top p-3">
            <a href="{{route('checkout')}}">
              <button class="btn btn-primary text-uppercase w-100">View Cart</button>
            </a>
          </li>
        </ul>
      </li>

        <!-- navbar button: Start -->
        @if (Route::has('login'))
            @auth
              @if(auth()->user()->role == 'customer')
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{asset(auth()->user()->customer->custimage)}}" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" >
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="{{asset(auth()->user()->customer->custimage)}}" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                          <small class="text-muted">{{auth()->user()->role}}</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('customer.profile',auth()->user()->customer->id)}}">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                      </a>
                  </form>
                  </li>
                </ul>
              </li>
              <!--/ User -->
              @endif

              @if(auth()->user()->role == 'admin')
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../../assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../../assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                          <small class="text-muted">{{auth()->user()->role}}</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">Dashboard</span>
                    </a>
                  </li>
                  <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                      </a>
                  </form>
                  </li>
                </ul>
              </li>
              <!--/ User -->
              @endif
            @else
              <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="{{ route('login') }}"><i class="bx bx-log-in"></i> Login</a>
              </li>
                <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> -->

              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="{{ route('register') }}"><i class="bx bx-dock-top"></i> Register</a>
              </li>
                <!-- <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> -->

              @endif

            @endauth

        @endif


        <!-- navbar button: End -->
      </ul>
      <!-- Toolbar: End -->
    </div>
  </div>
</nav>
<!-- Navbar: End -->