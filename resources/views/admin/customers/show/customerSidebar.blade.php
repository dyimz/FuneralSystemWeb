
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded my-4" src="{{asset($customer->custimage)}}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
              <h4 class="mb-2">{{$customer->fname}} {{$customer->lname}}</h4>
              <span class="badge bg-label-secondary">{{$customer->user->role}}</span>
            </div>  
          </div>
        </div>
        <div class="d-flex justify-content-around flex-wrap my-4 py-3">
          <div class="d-flex align-items-start me-4 mt-3 gap-3">
            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-shopping-bag bx-sm"></i></span>
            <div>
              <h5 class="mb-0">{{$countorders}}</h5>
              <span>Orders</span>
            </div>
          </div>
          <div class="d-flex align-items-start mt-3 gap-3">
            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-body bx-sm"></i></span>
            <div>
              <h5 class="mb-0">{{$countdeads}}</h5>
              <span>Deceased</span>
            </div>
          </div>
        </div>
        <h5 class="pb-2 border-bottom mb-4">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <div class="row">
                <span class="fw-medium me-2">Customer Name:</span>
                <span>{{$customer->fname}} {{$customer->lname}}</span>
              </div>

            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Email:</span>
              <span>{{$customer->user->email}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Verified:</span>
              @if($customer->verified)
                <span class="badge bg-label-success"><i class="bx bx-check"></i></span>
              @else
                <span class="badge bg-label-danger"><i class="bx bx-x"></i></span>
              @endif
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Role:</span>
              <span>{{$customer->user->role}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Age:</span>
              <span>{{$customer->age}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Contact:</span>
              <span>{{$customer->contact}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Sex:</span>
              <span>{{$customer->sex}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Address:</span>
              <span>{{$customer->address}}</span>
            </li>
            @if($customer->custvalidid)
            <li class="mb-3">
                <a href="/{{$customer->custvalidid}}" download="valid-id-customer#{{$customer->id}}">Download ID</a>
            </li>
            @endif
          </ul>
          <div class="d-flex justify-content-center pt-3">
            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser{{$customer->id}}" data-bs-toggle="modal">Edit</a>
            @if($customer->user->status === 'ACTIVE')
              <a href="{{route('admin.user.suspend', $customer->user->id)}}" class="btn btn-label-danger suspend-user">Suspend</a>
            @else
              <a href="{{route('admin.user.suspend', $customer->user->id)}}" class="btn btn-label-success suspend-user">Unsuspend</a>
            @endif

          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="pb-2 border-bottom mb-4">User details</h5>

        <ul class="list-unstyled mt-3 mb-0">
          <li class="d-flex align-items-center mb-3">
              <i class="bx bx-user"></i>
              <span class="fw-medium mx-2">Username:</span> 
              <span>{{$customer->user->username}}</span>
          </li>
          <li class="d-flex align-items-center mb-3">
              <i class='bx bx-envelope'></i>
              <span class="fw-medium mx-2">Email:</span> 
              <span>{{$customer->user->email}}</span>
          </li>
        </ul>
        
        <div class="d-grid w-100 mt-4 pt-2">
          <a href="{{route('users.edit', $customer->user->id)}}" class="btn btn-primary">Change Password</a>
        </div>
      </div>
    </div>
    <!-- /Plan Card -->
  </div>