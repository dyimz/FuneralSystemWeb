
@php
    // Assuming Notification is your model
    $notifications = \App\Models\AdminNotif::orderBy('created_at', 'desc')->get();
@endphp



<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
    
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">  
        <ul class="navbar-nav flex-row align-items-center ms-auto">

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="bx bx-bell bx-sm"></i>
              <span class="badge bg-danger rounded-pill badge-notifications">
                @if($notifications)
                  {{count($notifications)}}
                @else
                  0
                @endif
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Notification</h5>
                  <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                @if($notifications)
                <!-- FORLOOP HERE -->
                  @foreach($notifications as $not)
                    
                      <li class="list-group-item list-group-item-action dropdown-notifications-item" id="notificationItem">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">{{$not->title}}</h6>
                            <p class="mb-0">{{$not->description}}</p>

                            @php
                              $carbonTimestamp = Carbon\Carbon::parse($not->created_at);
                              $hoursDifference = $carbonTimestamp->diffInHours(now());
                            @endphp 

                            @if ($hoursDifference < 24)
                              <small class="text-muted">{{$carbonTimestamp->diffForHumans()}}</small>
                            @elseif ($hoursDifference < 24 * 7)
                              <small class="text-muted">{{$carbonTimestamp->diffInDays(now())}} day(s) ago</small>
                            @else
                              <small class="text-muted">{{$carbonTimestamp->diffInWeeks(now())}} week(s) ago</small>
                            @endif
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                          </div>
                        </div>
                      </li>
                  @endforeach
                @endif
                </ul>
              </li>
              <li class="dropdown-menu-footer border-top p-3">
                <button class="btn btn-primary text-uppercase w-100">view all notifications</button>
              </li>
            </ul>
          </li>
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                @if(auth()->user()->role == 'employee')
                  <img src="{{asset(auth()->user()->employee->image)}}" alt class="w-px-40 h-auto rounded-circle">
                @else
                  <img src="../../../../../../../../../../assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle">
                @endif
                
            </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
               <a class="dropdown-item" href="pages-account-settings-account.html"> 
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        @if(auth()->user()->role == 'employee')
                          <img src="{{asset(auth()->user()->employee->image)}}" alt class="w-px-40 h-auto rounded-circle">
                        @else
                          <img src="../../../../../../../../assets/img/avatars/admin.png" alt class="w-px-40 h-auto rounded-circle">
                        @endif
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">{{auth()->user()->username}}</span>
                      <small class="text-muted">{{auth()->user()->role}}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="pages-profile-user.html">
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
          
        </ul>
      </div>

</nav>

<script>
    document.getElementById('notificationItem').addEventListener('click', function() {
        // Extract the URL from your PHP code
        var notificationUrl = {!! isset($not) ? "'/admin/orders/' + '{$not->id}/edit'" : 'undefined' !!};


        // Navigate to the desired URL
        window.location.href = notificationUrl;
    });
</script>